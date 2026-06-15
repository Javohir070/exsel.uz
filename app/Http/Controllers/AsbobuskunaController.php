<?php

namespace App\Http\Controllers;

use App\Exports\AsbobuskunaExport;
use App\Imports\AsbobuskunaImport;
use App\Models\Asbobuskuna;
use App\Http\Requests\StoreAsbobuskunaRequest;
use App\Http\Requests\UpdateAsbobuskunaRequest;
use App\Models\Asbobuskunaexpert;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Monitoring;
use App\Models\Region;
use App\Models\Tashkilot;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AsbobuskunaController extends Controller
{
    public ?Monitoring $monitoring = null;

    public function __construct()
    {
        $this->middleware('auth');
        $this->monitoring = Monitoring::getActive();
    }

    public function index()
    {
        $tashkilotId = auth()->user()->tashkilot_id;

        $asbobuskunas = Asbobuskuna::where('tashkilot_id', $tashkilotId)
            ->paginate(20);

        $asbobuskunaList = Asbobuskuna::where('tashkilot_id', $tashkilotId)
            ->orderBy('name')
            ->get(['id', 'name']);

        $masullar = User::where('tashkilot_id', $tashkilotId)
            ->with(['roles', 'asbobuskunalar'])
            ->get()
            ->filter(fn (User $user) => $user->roles->contains('name', 'Asbob_uskunalarga_masul'));

        return view('admin.asbobuskuna.index', [
            'asbobuskunas' => $asbobuskunas,
            'asbobuskunaList' => $asbobuskunaList,
            'masullar' => $masullar,
        ]);
    }

    public function asbobuskunalar()
    {
        $user = auth()->user();
        $hasRegion = $user->region_id !== null;

        if ($hasRegion) {
            $regions = Region::where('id', $user->region_id)->get();
            $region = $regions->first();
            
            $tashkilotIds = $region->tashkilots()
                ->where('asbobuskuna_is', 1)
                ->whereHas('asbobuskunalar', function ($asbobuskunaQuery) {
                    $this->applyCurrentMonitoring($asbobuskunaQuery);
                })
                ->pluck('id');
            
            $tashkilots = $tashkilotIds->count();
            $asboblar_count = $this->applyCurrentMonitoring(Asbobuskuna::query())
                ->whereIn('tashkilot_id', $tashkilotIds)
                ->where('is_active', 1)
                ->count();
            $asboblar_expert = Asbobuskunaexpert::whereIn('tashkilot_id', $tashkilotIds)
                ->where('quarter', $this->monitoring->id)
                ->count();
        } else {
            $regions = Region::orderBy('order')->get();
            $tashkilots = Tashkilot::where('asbobuskuna_is', 1)
                ->whereHas('asbobuskunalar', function ($asbobuskunaQuery) {
                    $this->applyCurrentMonitoring($asbobuskunaQuery);
                })
                ->count();
            $asboblar_count = $this->applyCurrentMonitoring(Asbobuskuna::query())
                ->where('is_active', 1)
                ->count();
            $asboblar_expert = Asbobuskunaexpert::where('quarter', $this->monitoring->id)->count();
        }

        $asboblar_all = Asbobuskuna::count();

        return view('admin.asbobuskuna.viloyat', [
            'asboblar_count' => $asboblar_count,
            'regions' => $regions,
            'asboblar_expert' => $asboblar_expert,
            'tashkilots' => $tashkilots,
            'asboblar_all' => $asboblar_all,
            'monitoring' => $this->monitoring
        ]);
    }

    public function tashkilot_turi_asbobuskuna($id)
    {
        $region = Region::findOrFail($id);
        
        $tashkilotlarQuery = Tashkilot::where('asbobuskuna_is', 1)
            ->where('region_id', $id)
            ->whereHas('asbobuskunalar', function ($asbobuskunaQuery) {
                $this->applyCurrentMonitoring($asbobuskunaQuery);
            })
            ->with([
                'asbobuskunalar' => function ($q) {
                    $this->applyCurrentMonitoring($q)->where('is_active', 1);
                }
            ])
            ->get();
        $tashkilotIds = $tashkilotlarQuery->pluck('id');
        
        $tashkilots = $tashkilotlarQuery->count();

         // Guruhlash
         $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'asbobuskunalar' => $group->flatMap->asbobuskunalar->count(),
            ];
        }

        $asboblar_count = $this->applyCurrentMonitoring(Asbobuskuna::query())
            ->where('is_active', 1)
            ->whereIn('tashkilot_id', $tashkilotIds)
            ->count();
        
        $asboblar_expert = Asbobuskunaexpert::whereIn('tashkilot_id', $tashkilotIds)
            ->where('quarter', $this->monitoring->id)
            ->count();

        return view('admin.asbobuskuna.tashkilot_turi', [
            'results' => $results,
            'regions' => $region,
            'tashkilots' => $tashkilots,
            'asboblar_count' => $asboblar_count,
            'asboblar_expert' => $asboblar_expert,
            'monitoring' => $this->monitoring,
        ]);
    }


    public function search_asbobuskunalar(Request $request)
    {
        $query = $request->input('query');
        $regionId = $request->input('id');
        $type = $request->input('type');

        $isRegionSearch = is_numeric($regionId);

        $buildTashkilotQuery = function () use ($isRegionSearch, $regionId, $type, $query) {
            $queryBuilder = Tashkilot::where('asbobuskuna_is', 1)
                ->whereHas('asbobuskunalar', function ($asbobuskunaQuery) {
                    $this->applyCurrentMonitoring($asbobuskunaQuery);
                });

            if ($isRegionSearch) {
                $queryBuilder->where('region_id', $regionId)
                    ->where('tashkilot_turi', $type)
                    ->where('name', 'like', '%' . $query . '%');
            }

            return $queryBuilder;
        };

        $tashkilotlar = $buildTashkilotQuery()
            ->orderBy('name')
            ->paginate(50);

        $tashkilotIds = $buildTashkilotQuery()
            ->pluck('id');

        $asbobuskunas = $this->applyCurrentMonitoring(Asbobuskuna::query())
            ->where('is_active', 1)
            ->whereIn('tashkilot_id', $tashkilotIds)
            ->count();

        return view('admin.asbobuskuna.tashkilotlar', [
            'asbobuskunas' => $asbobuskunas,
            'tashkilotlar' => $tashkilotlar,
            'tash_count' => $tashkilotlar->total(),
            'monitoring' => $this->monitoring,
            'query' => $query,
            'regionId' => $regionId,
            'type' => $type,
        ]);
    }

    public function asbobu($id)
    {
        $tashkilot = Tashkilot::findOrFail($id);
        $asbobuskunas = $this->applyCurrentMonitoring(Asbobuskuna::query())
            ->where('is_active', 1)
            ->where('tashkilot_id', '=', $id)
            ->paginate(20);

        return view('admin.asbobuskuna.asbobuskunalar', [
            'asbobuskunas' => $asbobuskunas,
            'tashkilot' => $tashkilot,
            'monitoring' => $this->monitoring
        ]);
    }

    public function asbobuskunas_all(Request $request)
    {

        $query = Asbobuskuna::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhere('fish', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('turi') && $request->turi !== 'all') {
            $turi = $request->turi;
            $query->where('turi', 'like', '%' . $turi . '%');
        }

        if ($request->filled('moliya_manbasi') && $request->moliya_manbasi !== 'all') {
            $query->where('moliya_manbasi', '=', $request->moliya_manbasi);
        }

        $page = $request->input('page_size', 20);

        $asbobuskunas = $query->paginate($page);

        $regions = Region::orderBy('order')->get();

        //moliyalash manbasini statestikasi
        $asbobuskuna_count = Asbobuskuna::count();

        $moliya_institut = Asbobuskuna::where('moliya_manbasi', 'Moliya institutlari')->count();

        $homiylik = Asbobuskuna::where('moliya_manbasi', 'Homiylik mablag‘lari')->count();

        $tash_byudjetdan = Asbobuskuna::where('moliya_manbasi', 'Tashkilot byudjet mablag‘lari hisobidan')->count();

        $loyiha_doirasida = Asbobuskuna::where('moliya_manbasi', 'Ilmiy loyiha doirasida')->count();

        $ilm_fan = Asbobuskuna::where('moliya_manbasi', 'Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi')->count();

        $tash_byudjetdan_tashqari = Asbobuskuna::where('moliya_manbasi', 'Tashkilotning byudjetdan tashqari mablag‘lari hisobidan')->count();

        return view('admin.asbobuskuna.all', [
            'asbobuskunas' => $asbobuskunas,
            'regions' => $regions,
            'moliya_institut' => $moliya_institut,
            'homiylik' => $homiylik,
            'loyiha_doirasida' => $loyiha_doirasida,
            'tash_byudjetdan' => $tash_byudjetdan,
            'ilm_fan' => $ilm_fan,
            'tash_byudjetdan_tashqari' => $tash_byudjetdan_tashqari,
            'asbobuskuna_count' => $asbobuskuna_count
        ]);
    }


    public function create()
    {
        $tashkilotId = auth()->user()->tashkilot_id;

        $ilmiy_loyhalar = IlmiyLoyiha::where('tashkilot_id', $tashkilotId)->get();
        $laboratorys = Laboratory::where('tashkilot_id', $tashkilotId)->get();
        $kafedralar = Kafedralar::where('tashkilot_id', $tashkilotId)->get();

        return view('admin.asbobuskuna.create', [
            'laboratorys' => $laboratorys,
            'ilmiy_loyhalar' => $ilmiy_loyhalar,
            'kafedralar' => $kafedralar
        ]);
    }


    public function store(StoreAsbobuskunaRequest $request)
    {
        $data = $request->validated();
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['user_id'] = auth()->user()->id;
        $data['laboratory_id'] = $request->laboratory_id == 'yoq' ? null : $request->laboratory_id;
        $data['kafedralar_id'] = $request->kafedralar_id == 'yoq' ? null : $request->kafedralar_id;

        Asbobuskuna::create($data);

        return redirect()->route('asbobuskuna.index')->with('status', 'Asbob uskunasi qo`shildi');
    }


    public function show(Asbobuskuna $asbobuskuna)
    {
        $asbobuskunaexpert = Asbobuskunaexpert::where('quarter', $this->monitoring->id)->where('asbobuskuna_id', $asbobuskuna->id)->get();
        $quarter_1 = Asbobuskunaexpert::where('quarter', 1)->where('asbobuskuna_id', $asbobuskuna->id)->first();
        $quarter_2 = Asbobuskunaexpert::where('quarter', 2)->where('asbobuskuna_id', $asbobuskuna->id)->first();
        $tashkilotlar = Tashkilot::all();

        return view('admin.asbobuskuna.show', [
            'asbobuskuna' => $asbobuskuna,
            'asbobuskunaexpert' => $asbobuskunaexpert,
            'quarter_1' => $quarter_1,
            'quarter_2' => $quarter_2,
            'tashkilotlar' => $tashkilotlar
        ]);
    }


    public function edit(Asbobuskuna $asbobuskuna)
    {
        $tashkilotId = auth()->user()->tashkilot_id;
        $ilmiy_loyhalar = IlmiyLoyiha::where('tashkilot_id', $tashkilotId)->get();
        $laboratorys = Laboratory::where('tashkilot_id', $tashkilotId)->get();
        $kafedralar = Kafedralar::where('tashkilot_id', $tashkilotId)->get();

        return view('admin.asbobuskuna.edit', [
            'asbobuskuna' => $asbobuskuna,
            'laboratorys' => $laboratorys,
            'ilmiy_loyhalar' => $ilmiy_loyhalar,
            'kafedralar' => $kafedralar
        ]);
    }


    public function update(UpdateAsbobuskunaRequest $request, Asbobuskuna $asbobuskuna)
    {
        $data = $request->validated();
        
        $data['laboratory_id'] = $request->laboratory_id == 'yoq' ? null : $request->laboratory_id;
        $data['kafedralar_id'] = $request->kafedralar_id == 'yoq' ? null : $request->kafedralar_id;
        $data['user_id'] = auth()->user()->id;

        $asbobuskuna->update($data);

        return redirect()->route('asbobuskuna.index')->with('status', 'Asbob uskunasi tahrirlandi');
    }


    public function destroy(Asbobuskuna $asbobuskuna)
    {
        $asbobuskuna->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }


    public function asbobuskuna_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new AsbobuskunaImport, $request->file('file'));

        return back()->with('status', 'Fayl muvaffaqiyatli yuklandi!');
    }

    public function export_asbobuskunalar()
    {
        ini_set('memory_limit', '1024M'); // Yoki kerakli miqdorda xotira limiti qo'ying
        ini_set('max_execution_time', '300');

        return Excel::download(new AsbobuskunaExport, 'asbobuskunalar.xlsx');
    }

    public function tashkilot_asbobuskuna(Request $request, $id)
    {
        $asbobuskuna = Asbobuskuna::findOrFail($id);
        $isActive = (int) $request->input('is_active', 0);
        $asbobuskunaIs = (int) $request->input('asbobuskuna_is', $isActive);

        $asbobuskuna->update([
            'tashkilot_id' => $request->tashkilot_id,
            'is_active' => $isActive,
        ]);

        $tashkilot = Tashkilot::findOrFail($request->tashkilot_id);
        $tashkilot->update([
            'asbobuskuna_is' => $asbobuskunaIs,
        ]);

        if ($this->monitoring) {
            if ($asbobuskunaIs === 1) {
                $asbobuskuna->monitorings()->syncWithoutDetaching([$this->monitoring->id]);
            } else {
                $asbobuskuna->monitorings()->detach($this->monitoring->id);
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
}
