<?php

namespace App\Http\Controllers;

use App\Exports\IlmiyLoyihasExport;
use App\Exports\LoyihalarToMonitoringExport;
use App\Http\Requests\StoreIlmiyLoyihaRequest;
use App\Http\Requests\UpdateIlmiyLoyihaRequest;
use App\Imports\IlmiyLoyihaImport;
use App\Models\IlmiyLoyiha;
use App\Models\Intellektual;
use App\Models\Laboratory;
use App\Models\Loyihaijrochilar;
use App\Models\Loyihaiqtisodi;
use App\Models\Monitoring;
use App\Models\Region;
use App\Models\Tashkilot;
use App\Models\Tekshirivchilar;
use App\Models\Umumiyyil;
use App\Models\User;
use App\Support\IlmiyIdApiClient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IlmiyLoyihaController extends Controller
{
    public ?Monitoring $monitoring = null;

    public function __construct()
    {
        $this->middleware('auth');
        $this->monitoring = Monitoring::getActive();
    }

    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;

        $ilmiyloyiha = IlmiyLoyiha::where('tashkilot_id', $tashRId)
            ->latest()
            ->paginate(20);

        $masullar = User::where('tashkilot_id', $tashRId)
            ->with('roles')
            ->get()
            ->filter(fn (User $user) => $user->roles->contains('name', 'Ilmiy_loyiha_rahbari'));

        return view('admin.ilmiyloyiha.index', [
            'ilmiyloyiha' => $ilmiyloyiha,
            'masullar' => $masullar,
        ]);
    }

    public function create()
    {
        $tashkilots = Tashkilot::orderBy('name')->get();
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.ilmiyloyiha.create', [
            'tashkilots' => $tashkilots,
            'laboratorylar' => $laboratorylar,
        ]);
    }

    public function scientific_project()
    {
        $ilmiy_loyhalar = IlmiyLoyiha::where('user_id', auth()->id())->get();

        return view('admin.ilmiyloyiha.loyha_rahbari', ['ilmiy_loyhalar' => $ilmiy_loyhalar]);
    }

    public function store(StoreIlmiyLoyihaRequest $request)
    {
        IlmiyLoyiha::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => $request->tashkilot_id ?? auth()->user()->tashkilot_id,
            'kafedralar_id' => auth()->user()->kafedralar_id,
            'mavzusi' => $request->mavzusi,
            'turi' => $request->turi,
            'dastyri' => $request->dastyri ?? 'yoq',
            'q_hamkor_tashkilot' => $request->q_hamkor_tashkilot ?? 'yoq',
            'hamkor_davlat' => $request->hamkor_davlat ?? 'yoq',
            'muddat' => $request->muddat ?? 'yoq',
            'bosh_sana' => $request->bosh_sana,
            'tug_sana' => $request->tug_sana,
            'pan_yunalish' => $request->pan_yunalish,
            'rahbar_name' => $request->rahbar_name,
            'raqami' => $request->raqami,
            'sanasi' => $request->sanasi ?? 'yoq',
            'sum' => $request->sum,
            'umumiy_mablag' => $request->sum ?? 'yoq',
            'olingan_natija' => $request->olingan_natija ?? 'yoq',
            'joriy_holati' => $request->joriy_holati ?? 'yoq',
            'tijoratlashtirish' => $request->tijoratlashtirish ?? 'yoq',
            'moliyalashtirilganmi' => $request->moliyalashtirilganmi,
        ]);

        $user = auth()->user();
        $status = 'Ma\'lumotlar muvaffaqiyatli qo\'shildi.';

        if ($user->hasRole('labaratoriyaga_masul')) {
            return redirect()->route('lab_ilmiyloyiha.index')->with('status', $status);
        }

        if ($user->hasRole('kafedra_mudiri')) {
            return redirect('/kafedralar-ilmiyloyhi')->with('status', $status);
        }

        return redirect('/ilmiyloyiha')->with('status', $status);
    }

    public function show(IlmiyLoyiha $ilmiyloyiha, Request $request)
    {
        $scienceid = $request->input('scienceid');
        $quarterId = $this->monitoring->id;
        $monitorings = Monitoring::pluck('id');
        
        $intellektual = Intellektual::where('ilmiy_loyiha_id', $ilmiyloyiha->id)
            ->where('quarter', $quarterId)
            ->first();
        $loyihaiqtisodi = Loyihaiqtisodi::where('ilmiy_loyiha_id', $ilmiyloyiha->id)
            ->where('quarter', $quarterId)
            ->first();

        $tekshirivchilar = Tekshirivchilar::where('quarter', $quarterId)
            ->where('ilmiy_loyiha_id', $ilmiyloyiha->id)
            ->first();

        $loyihaiqtisodi_1 = Loyihaiqtisodi::where('ilmiy_loyiha_id', $ilmiyloyiha->id)
            ->whereIn('quarter', $monitorings)
            ->latest()
            ->first();
        $intellektual_1 = Intellektual::where('ilmiy_loyiha_id', $ilmiyloyiha->id)
            ->whereIn('quarter', $monitorings)
            ->latest()
            ->first();

        $quarters = Tekshirivchilar::where('is_active', 1)
            ->where('ilmiy_loyiha_id', $ilmiyloyiha->id)
            ->whereNotNull('file')
            ->get();

        ['data' => $data, 'errorMessage' => $errorMessage] = $this->resolveScienceIdUserData($scienceid);

        $loyihaijrochilar = Loyihaijrochilar::where('ilmiy_loyiha_id', $ilmiyloyiha->id)->get();
        $shtat_sum = (int) $loyihaijrochilar->sum('shtat_birligi');

        return view('admin.ilmiyloyiha.show', [
            'ilmiyloyiha' => $ilmiyloyiha,
            'intellektual' => $intellektual,
            'loyihaiqtisodi' => $loyihaiqtisodi,
            'tekshirivchilar' => $tekshirivchilar,
            'data' => $data,
            'create' => null,
            'loyihaijrochilar' => $loyihaijrochilar,
            'errorMessage' => $errorMessage,
            'scienceid' => $scienceid ?? '',
            'shtat_sum' => $shtat_sum,
            'quarters' => $quarters,
            'tashkilotlar' => Tashkilot::all(),
            'intellektual_1' => $intellektual_1,
            'loyihaiqtisodi_1' => $loyihaiqtisodi_1,
        ]);
    }

    public function edit(IlmiyLoyiha $ilmiyloyiha)
    {
        $tashkilots = Tashkilot::orderBy('name')->get();
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.ilmiyloyiha.edit', [
            'ilmiyloyiha' => $ilmiyloyiha,
            'tashkilots' => $tashkilots,
            'laboratorylar' => $laboratorylar,
        ]);
    }

    public function update(UpdateIlmiyLoyihaRequest $request, IlmiyLoyiha $ilmiyloyiha)
    {
        $payload = [
            'user_id' => auth()->id(),
            'mavzusi' => $request->mavzusi,
            'mavzusi_ru' => $request->mavzusi_ru,
            'turi' => $request->turi ?? "yo'q",
            'raqami' => $request->raqami,
            'sh_raqami' => $request->sh_raqami,
            'sanasi' => $request->sanasi,
            'bosh_sana' => $request->bosh_sana,
            'tug_sana' => $request->tug_sana,
            'sum' => $request->sum,
            'joriy_yil_sum' => $request->joriy_yil_sum,
            'jami_summa_nisbat' => $request->jami_summa_nisbat,
            'rahbar_name' => $request->rahbar_name,
            'rahbariilmiy_darajasi' => $request->rahbariilmiy_darajasi,
            'rahbariilmiy_unvoni' => $request->rahbariilmiy_unvoni,
            'r_lavozimi' => $request->r_lavozimi,
            'rsh_raqami' => $request->rsh_raqami,
            'rsh_sanasi' => $request->rsh_sanasi,
            'loyiha_rahbari_uzgargan' => $request->loyiha_rahbari_uzgargan,
            'avvr_fish' => $request->loyiha_rahbari_uzgargan != "yo'q" ? $request->avvr_fish : null,
            'avvr_ilmiy_daraja' => $request->loyiha_rahbari_uzgargan != "yo'q" ? $request->avvr_ilmiy_daraja : null,
            'avvr_ilmiy_unvon' => $request->loyiha_rahbari_uzgargan != "yo'q" ? $request->avvr_ilmiy_unvon : null,
            'avvr_lavozimi' => $request->loyiha_rahbari_uzgargan != "yo'q" ? $request->avvr_lavozimi : null,
            'avvr_kelishuv_raqami' => $request->loyiha_rahbari_uzgargan != "yo'q" ? $request->avvr_kelishuv_raqami : null,
            'avvr_kelishuv_sanasi' => $request->loyiha_rahbari_uzgargan != "yo'q" ? $request->avvr_kelishuv_sanasi : null,
            'loyiha_hamrahbari' => $request->loyiha_hamrahbari,
            'hamrahbar_fish' => $request->loyiha_hamrahbari != "yo'q" ? $request->hamrahbar_fish : null,
            'hamr_ishjoyi' => $request->loyiha_hamrahbari != "yo'q" ? $request->hamr_ishjoyi : null,
            'hamr_lavozimi' => $request->loyiha_hamrahbari != "yo'q" ? $request->hamr_lavozimi : null,
            'hamr_davlati' => $request->loyiha_hamrahbari != "yo'q" ? $request->hamr_davlati : null,
        ];

        if ($request->hasFile('umumiy_mablag')) {
            $payload['umumiy_mablag'] = $request->file('umumiy_mablag')->storeAs(
                'IlmiyLoyiha-file',
                time() . $request->file('umumiy_mablag')->getClientOriginalName()
            );
        }

        $ilmiyloyiha->update($payload);

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi');
    }

    public function destroy(IlmiyLoyiha $ilmiyloyiha)
    {
        $ilmiyloyiha->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }

    public function ilmiyloyihalar()
    {
        $user = auth()->user();
        $hasRegion = $user->region_id !== null;

        if ($hasRegion) {
            $regions = Region::where('id', $user->region_id)->get();
            $region = $regions->first();

            $tashkilotIds = $region->tashkilots()
                ->where('ilmiyloyiha_is', 1)
                ->whereHas('ilmiyloyhalar', function ($ilmiyLoyihaQuery) {
                    $this->applyCurrentMonitoring($ilmiyLoyihaQuery);
                })
                ->pluck('id');

            $tashkilots = $tashkilotIds->count();
            $loy_count = $this->applyCurrentMonitoring(IlmiyLoyiha::query())
                ->whereIn('tashkilot_id', $tashkilotIds)
                ->count();
            $loy_expert = Tekshirivchilar::whereIn('tashkilot_id', $tashkilotIds)
                ->where('quarter', $this->monitoring->id)
                ->where('is_active', 1)
                ->count();
        } else {
            $regions = Region::orderBy('order')->get();
            $loy_count = $this->applyCurrentMonitoring(IlmiyLoyiha::query())->count();
            $loy_expert = Tekshirivchilar::where('quarter', $this->monitoring->id)->count();
            $tashkilots = Tashkilot::where('ilmiyloyiha_is', 1)
                ->whereHas('ilmiyloyhalar', function ($ilmiyLoyihaQuery) {
                    $this->applyCurrentMonitoring($ilmiyLoyihaQuery);
                })
                ->count();
        }

        $loyha_count = IlmiyLoyiha::count();

        return view('admin.ilmiyloyiha.viloyat', [
            'tashkilots' => $tashkilots,
            'loy_count' => $loy_count,
            'loy_expert' => $loy_expert,
            'regions' => $regions,
            'loyha_count' => $loyha_count,
            'monitoring_id' => $this->monitoring->id,
        ]);
    }

    public function tashkilot_turi($id)
    {
        $tashkilotlarQuery = Tashkilot::where('ilmiyloyiha_is', 1)
            ->where('region_id', $id)
            ->whereHas('ilmiyloyhalar', function ($ilmiyLoyihaQuery) {
                $this->applyCurrentMonitoring($ilmiyLoyihaQuery);
            })
            ->with([
                'ilmiyloyhalar' => fn ($query) => $this->applyCurrentMonitoring($query),
            ])
            ->get();

        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];
        $typeCounts = [
            'otm' => $groups['otm']->count(),
            'itm' => $groups['itm']->count(),
            'other' => $groups['other']->count(),
        ];

        $results = [];
        foreach ($groups as $key => $group) {
            $results[$key] = [
                'ilmiyloyhalar' => $group->pluck('ilmiyloyhalar')->flatten()->count(),
            ];
        }

        $regions = Region::findOrFail($id);
        $tashkilotIds = $tashkilotlarQuery->pluck('id');
        $tashkilots = $tashkilotlarQuery->count();
        $loy_count = $this->applyCurrentMonitoring(IlmiyLoyiha::query())
            ->whereIn('tashkilot_id', $tashkilotIds)
            ->count();
        $loy_expert = Tekshirivchilar::where('quarter', $this->monitoring->id)
            ->whereIn('tashkilot_id', $tashkilotIds)
            ->count();

        return view('admin.ilmiyloyiha.tashkilot_turi', [
            'results' => $results,
            'regions' => $regions,
            'tashkilots' => $tashkilots,
            'loy_count' => $loy_count,
            'loy_expert' => $loy_expert,
            'typeCounts' => $typeCounts,
        ]);
    }

    public function search_ilmiy_loyhalar(Request $request)
    {
        $query = $request->input('query');
        $regionId = $request->input('id');
        $type = $request->input('type');
        $isRegionSearch = is_numeric($regionId);

        $queryBuilder = Tashkilot::where('ilmiyloyiha_is', 1)
            ->whereHas('ilmiyloyhalar', function ($ilmiyLoyihaQuery) {
                $this->applyCurrentMonitoring($ilmiyLoyihaQuery);
            });

        if ($isRegionSearch) {
            $queryBuilder
                ->where('region_id', $regionId)
                ->where('tashkilot_turi', $type)
                ->where('name', 'like', '%' . $query . '%');
        }

        $tashkilotIds = (clone $queryBuilder)->pluck('id');
        $tashkilotlar = $queryBuilder->orderBy('name')->paginate(50);
        $ilmiyloyiha = $this->applyCurrentMonitoring(IlmiyLoyiha::query())
            ->whereIn('tashkilot_id', $tashkilotIds)
            ->count();

        return view('admin.ilmiyloyiha.tashkilotlar', [
            'tashkilotlar' => $tashkilotlar,
            'tash_count' => $tashkilotlar->total(),
            'ilmiyloyiha' => $ilmiyloyiha,
            'monitoring_id' => $this->monitoring->id,
            'regionId' => $regionId,
            'query' => $query,
            'type' => $type,
        ]);
    }

    public function ilmiy_loyihalar($id)
    {
        $tashkilot = Tashkilot::findOrFail($id);

        $ilmiyloyihalar = $this->applyCurrentMonitoring(IlmiyLoyiha::query())
            ->where('tashkilot_id', $id)
            ->paginate(20);

        return view('admin.ilmiyloyiha.ilmiyloyihalar', [
            'ilmiyloyihalar' => $ilmiyloyihalar,
            'tashkilot' => $tashkilot,
            'monitoring' => $this->monitoring,
        ]);
    }

    public function ilmiy_loyihalar_all(Request $request)
    {
        $query = IlmiyLoyiha::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('mavzusi', 'like', '%' . $search . '%')
                    ->orWhere('rahbar_name', 'like', '%' . $search . '%')
                    ->orWhere('raqami', 'like', '%' . $search . '%')
                    ->orWhere('dastyri', 'like', '%' . $search . '%')
                    ->orWhere('pan_yunalish', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('rahbar_name') && empty($request->search)) {
            $query->where('rahbar_name', 'like', '%' . $request->rahbar_name . '%');
        }

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('turi', 'like', '%' . $request->type . '%');
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('region_id') && $request->region_id !== 'all') {
            $region_id = $request->region_id;
            $query->whereHas('tashkilot.region', function ($q) use ($region_id) {
                $q->where('region_id', $region_id);
            });
        }

        $page = $request->input('page_size', 20);
        $ilmiyloyihalar = $query->paginate($page);
        $regions = Region::orderBy('order')->get();

        return view('admin.ilmiyloyiha.all', [
            'ilmiyloyihalar' => $ilmiyloyihalar,
            'regions' => $regions,
        ]);
    }

    public function exportilmiy()
    {
        $fileName = 'Ilmiyloyihalar' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new IlmiyLoyihasExport, $fileName);
    }

    public function monitoring_exportilmiy()
    {
        $fileName = 'monitoring_ilmiyloyihalar' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new LoyihalarToMonitoringExport, $fileName);
    }

    public function IlmiyLoyiha_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new IlmiyLoyihaImport, $request->file('file'));

        return back()->with('status', 'Fayl muvaffaqiyatli yuklandi!');
    }

    public function tashkilot_ilmiyloyiha(Request $request, $id)
    {
        $ilmi = IlmiyLoyiha::findOrFail($id);
        $isActive = (int) $request->input('is_active', 0);
        $ilmiyLoyihaIs = (int) $request->input('ilmiyloyiha_is', $isActive);

        $ilmi->update([
            'tashkilot_id' => $request->tashkilot_id,
            'is_active' => $isActive,
        ]);
        $tashkilot = Tashkilot::findOrFail($request->tashkilot_id);
        $tashkilot->update([
            'ilmiyloyiha_is' => $ilmiyLoyihaIs,
        ]);

        if ($this->monitoring) {
            if ($ilmiyLoyihaIs === 1) {
                $ilmi->monitorings()->syncWithoutDetaching([$this->monitoring->id]);
            } else {
                $ilmi->monitorings()->detach($this->monitoring->id);
            }
        }

        return back()->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    private function applyCurrentMonitoring($query)
    {
        if (! $this->monitoring) {
            return $query;
        }

        return $query->whereHas('monitorings', function ($monitoringQuery) {
            $monitoringQuery->whereKey($this->monitoring->id);
        });
    }

    /**
     * @return array{data: ?array, errorMessage: ?string}
     */
    private function resolveScienceIdUserData(?string $scienceId): array
    {
        if ($scienceId === null || $scienceId === '') {
            return ['data' => null, 'errorMessage' => null];
        }

        $response = IlmiyIdApiClient::userByScienceId($scienceId);

        if ($response === null) {
            return [
                'data' => null,
                'errorMessage' => 'Science ID API uchun .env faylida ILMIY_ID_API_USERNAME va ILMIY_ID_API_PASSWORD sozlang.',
            ];
        }

        $data = $response->json();

        if (isset($data['detail'])) {
            return [
                'data' => null,
                'errorMessage' => 'Bunday Science ID raqamiga ega  foydalanuvchisi mavjud emas.',
            ];
        }

        return ['data' => $data, 'errorMessage' => null];
    }
}
