<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Doktarantura;
use App\Models\Doktaranturaexpert;
use App\Models\IlmiyLoyiha;
use App\Models\Region;
use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\Tashkilot;
use App\Models\Tekshirivchilar;
use Illuminate\Http\Request;
use App\Exports\TashkilotExport;
use App\Exports\TashkilotXodimlarExport;
use App\Http\Requests\StoreTashkilotRequest;
use Maatwebsite\Excel\Facades\Excel;

class TashkilotController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:view tashkilotlar', ['only' => ['index']]);
    //     $this->middleware('permission:create tashkilotlar', ['only' => ['create','store']]);
    //     $this->middleware('permission:update tashkilotlar', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete tashkilotlar', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $tashkilot = auth()->user()->tashkilot;

        return view('admin.tashkilot.index', ['tashkilot' => $tashkilot]);
    }


    public function create()
    {
        return view('admin.tashkilot.create');
    }


    public function tashkilot_create()
    {
        $regions = Region::all();

        return view('admin.tashkilot.qoshish', ['regions' => $regions]);
    }


    public function store(StoreTashkilotRequest $request)
    {
        $request->validate([
            'stir_raqami' => 'required|unique:tashkilots,stir_raqami',
        ]);

        if ($request->hasFile('logo')) {
            $name = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('post-photos', $name);
        }

        Tashkilot::create([
            "name" => $request->name,
            "id_raqam" => $request->id_raqam,
            "region_id" => $request->region_id ?? null,
            "name_qisqachasi" => $request->name_qisqachasi ?? null,
            "tash_yil" => $request->tash_yil ?? null,
            "yur_manzil" => $request->yur_manzil ?? null,
            "logo" => $path ?? null,
            "viloyat" => $request->viloyat ?? null,
            "tuman" => $request->tuman ?? null,
            "paoliyat_manzil" => $request->paoliyat_manzil ?? null,
            "phone" => $request->phone ?? null,
            "email" => $request->email ?? null,
            "web_sayti" => $request->web_sayti ?? null,
            "turi" => $request->turi ?? null,
            "xarajatlar" => $request->xarajatlar ?? null,
            "shtat_bir" => $request->shtat_bir ?? null,
            "tash_xodimlar" => $request->tash_xodimlar ?? null,
            "ilmiy_xodimlar" => $request->ilmiy_xodimlar ?? null,
            "boshqariv" => $request->boshqariv ?? null,
            "stir_raqami" => $request->stir_raqami ?? null,
            "bank" => $request->bank ?? null,
            'hisob_raqam' => $request->hisob_raqam ?? null,
            'tashkilot_turi' => $request->tashkilot_turi ?? null,
        ]);

        return redirect('/tashkilotlar')->with('status', 'Ma\'lumotlar muvaffaqiyatli qo\'shildi.');
    }


    public function show(Tashkilot $tashkilot)
    {
        $regions = Region::all();
        return view('admin.tashkilot.show', ['tashkilot' => $tashkilot, 'regions' => $regions]);
    }


    public function edit(Tashkilot $tashkilot)
    {
        return view('admin.tashkilot.edit', ['tashkilot' => $tashkilot]);
    }


    public function update(Request $request, Tashkilot $tashkilot)
    {
        if($request->holati == 'rejected' || $request->holati == 'accepted' || $request->filled('region_id') ){
            $tashkilot->update([
                'holati' => $request->holati ?? $tashkilot->holati,
                'name' => $request->name ?? $tashkilot->name,
                'region_id' => $request->region_id ?? $tashkilot->region_id,
                'ilmiyloyiha_is' => $request->ilmiyloyiha_is ?? 0,
                'asbobuskuna_is' => $request->asbobuskuna_is ?? 0,
                'doktarantura_is' => $request->doktarantura_is ?? 0,
                'stajirovka_is' => $request->stajirovka_is ?? 0,
            ]);
            return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli saqlandi.');
        }else{
            
            if ($request->hasFile('logo')) {
                $name = $request->file('logo')->getClientOriginalName();
                $path = $request->file('logo')->storeAs('post-photos', $name);
            }

            $tashkilot->update([
                "name" => $request->name,
                "name_qisqachasi" => $request->name_qisqachasi,
                "tash_yil" => $request->tash_yil,
                "yur_manzil" => $request->yur_manzil,
                "viloyat" => $request->viloyat,
                "logo" => $path ?? null,
                "tuman" => $request->tuman,
                "paoliyat_manzil" => $request->paoliyat_manzil,
                "phone" => $request->phone,
                "email" => $request->email,
                "web_sayti" => $request->web_sayti,
                "turi" => $request->turi,
                "xarajatlar" => $request->xarajatlar,
                "shtat_bir" => $request->shtat_bir,
                "tash_xodimlar" => $request->tash_xodimlar,
                "ilmiy_xodimlar" => $request->ilmiy_xodimlar,
                "boshqariv" => $request->boshqariv,
                "stir_raqami" => $request->stir_raqami,
                "bank" => $request->bank,
                'hisob_raqam' => $request->hisob_raqam ?? null
            ]);

            return redirect('/tashkilot')->with('status', 'Ma\'lumotlar muvaffaqiyatli saqlandi.');
        }
    }


    public function destroy(Tashkilot $tashkilot)
    {
        $tashkilot->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');

    }

    public function tashkilotlar(Request $request)
    {
        $query = Tashkilot::query();

        $regions = Region::orderBy('order')->get();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('stir_raqami', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('region_id') && $request->region_id !== 'all') {
            $query->where('region_id', $request->region_id);
        }

        if ($request->filled('turi') && $request->turi !== 'all') {
            $query->where('tashkilot_turi', 'like', '%' . $request->turi . '%');
        }

        $tash_count = $query->count();

        $tashkilotlar = $query->paginate(20);

        return view('admin.tashkilot.all', [
            'tashkilotlar' => $tashkilotlar,
            'regions' => $regions,
            'tash_count' => $tash_count
        ]);

    }

    public function tashkilot_region($id)
    {

        $tashkilotlarQuery = Tashkilot::where('status', 1)->where('region_id', '=', $id)->with(['ilmiyloyhalar', 'asbobuskunalar', 'stajirovkalar'])
            ->get();

        // Turga qarab guruhlash
        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'ilmiyloyhalar' => $group->pluck('ilmiyloyhalar')->flatten()->where('is_active', 1)->count(),
                'stajirovkalar' => $group->pluck('stajirovkalar')->flatten()->where('quarter', 2)->count(),
                'asbobuskunalar' => $group->pluck('asbobuskunalar')->flatten()->where('is_active', 1)->count(),
                'doktarantura' => $group->pluck('doktaranturalar')->flatten()->where('quarter', 2)->count(),
            ];

        }
        $regions = Region::findOrFail($id);

        $id_tash = $tashkilotlarQuery->pluck('id');
        $tashkilotlar = $tashkilotlarQuery->count();

        $doktarantura = Doktarantura::whereIn('tashkilot_id', $id_tash)->where('quarter', 2)->count();
        $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $id_tash)->where('quarter', 2)->count();
        $stajirovka_expert = Stajirovkaexpert::whereIn('tashkilot_id', $id_tash)->where('quarter', 2)->count();
        $asboblar_count = Asbobuskuna::where('is_active', 1)->whereIn('tashkilot_id', $id_tash)->count();
        $asboblar_expert = Asbobuskunaexpert::whereIn('tashkilot_id', $id_tash)->where('quarter', 2)->count();
        $doktarantura_expert = Doktarantura::whereIn('tashkilot_id', $id_tash)->where('quarter', 2)->where('status', 1)->count();
        $loy_count = IlmiyLoyiha::where('is_active', 1)->whereIn('tashkilot_id', $id_tash)->count();
        $loy_expert = Tekshirivchilar::where('is_active', 1)->where('quarter', 2)->whereIn('tashkilot_id', $id_tash)->count();

        return view('admin.tashkilot.tashkilot_turi', [
            'results' => $results,
            'regions' => $regions,
            'tashkilotlar' => $tashkilotlar,
            'loy_count' => $loy_count,
            'stajirovka_count' => $stajirovka_count,
            'asboblar_count' => $asboblar_count,
            'doktarantura' => $doktarantura,
            'stajirovka_expert' => $stajirovka_expert,
            'asboblar_expert' => $asboblar_expert,
            'loy_expert' => $loy_expert,
            'doktarantura_expert' => $doktarantura_expert,
            'tashkilotlarQuery' => $tashkilotlarQuery,
        ]);
    }


    public function exportashkilot()
    {
        $fileName = 'Tashkilot_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new TashkilotExport, $fileName);

    }

    public function exportXodimlar($tashkilotId)
    {
        return Excel::download(new TashkilotXodimlarExport($tashkilotId), 'xodimlar.xlsx');
    }

}
