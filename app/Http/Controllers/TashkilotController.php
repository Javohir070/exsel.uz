<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Doktaranturaexpert;
use App\Models\IlmiyLoyiha;
use App\Models\Region;
use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\Tashkilot;
use Illuminate\Http\Request;
use App\Exports\TashkilotExport;
use App\Exports\TashkilotXodimlarExport;
use App\Http\Requests\StoreTashkilotRequest;
use Illuminate\Support\Facades\Cache;
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashkilot = auth()->user()->tashkilot;

        return view('admin.tashkilot.index', ['tashkilot' => $tashkilot]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tashkilot.create');
    }
    public function tashkilot_create()
    {
        return view('admin.tashkilot.qoshish');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTashkilotRequest $request)
    {
        // $request->validate([
        //     'name' => ['required', 'regex:/^[A-Za-z\s\-\'\.]+$/'],
        //     'id_raqam' => 'required|unique:tashkilots',
        // ]);

        if ($request->hasFile('logo')) {
            $name = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('post-photos', $name);
        }

        Tashkilot::create([
            "name" => $request->name,
            "id_raqam" => $request->id_raqam,
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
            'hisob_raqam' => $request->hisob_raqam ?? null
        ]);

        return redirect('/tashkilotlar')->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tashkilot $tashkilot)
    {
        return view('admin.tashkilot.show', ['tashkilot' => $tashkilot]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tashkilot $tashkilot)
    {
        return view('admin.tashkilot.edit', ['tashkilot' => $tashkilot]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tashkilot $tashkilot)
    {
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

        return redirect('/tashkilot');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tashkilot $tashkilot)
    {
        $tashkilot->delete();
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');

    }

    public function tashkilotlar()
    {
        $tashkilotlar = Tashkilot::orderBy('id_raqam', 'asc')->paginate(20);
        $regions = Region::all();
        return view('admin.tashkilot.tashkilotlar', ['tashkilotlar' => $tashkilotlar, 'regions' => $regions]);

    }

    public function search(Request $request)
    {
        $querysearch = $request->input('query');
        if (ctype_digit($querysearch)) {
            $tashkilotlar = Tashkilot::where('status', 1)->where('region_id', '=', $querysearch)->paginate(50);
            $tash_count = Tashkilot::where('status', 1)->where('region_id', '=', $querysearch)->count();
        } elseif ($querysearch == 'otm' || $querysearch == 'itm') {
            $tashkilotlar = Tashkilot::where('status', 1)->where('tashkilot_turi', 'like', '%' . $querysearch . '%')->paginate(50);
            $tash_count = Tashkilot::where('status', 1)->where('tashkilot_turi', 'like', '%' . $querysearch . '%')->count();
        } else {
            $tashkilotlar = Tashkilot::where('status', 1)->where('name', 'like', '%' . $querysearch . '%')->paginate(50);
            $tash_count = Tashkilot::where('status', 1)->where('name', 'like', '%' . $querysearch . '%')->count();
        }
        $tashkilot_ids = $tashkilotlar->pluck('id');
        $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $tashkilot_ids)->count();
        $loy_count = IlmiyLoyiha::where('is_active', 1)->whereIn('tashkilot_id', $tashkilot_ids)->count();
        $asboblar_count = Asbobuskuna::where('is_active', 1)->whereIn('tashkilot_id', $tashkilot_ids)->count();
        $doktarantura_count = $tashkilotlar->where('doktarantura_is', 1)->count();

        $doktarantura = Doktaranturaexpert::count();
        $stajirovka_expert = Stajirovkaexpert::count();
        $asboblar_expert = Asbobuskunaexpert::count();
        $doktarantura_expert = Doktaranturaexpert::count();
        $loy_expert = 0;

        $regions = Region::all();

        return view('admin.tashkilot.search_results', [
            'tashkilotlar' => $tashkilotlar,
            'regions' => $regions,
            'tash_count' => $tash_count,
            'loy_count' => $loy_count,
            'stajirovka_count' => $stajirovka_count,
            'asboblar_count' => $asboblar_count,
            'doktarantura' => $doktarantura,
            'stajirovka_expert' => $stajirovka_expert,
            'asboblar_expert' => $asboblar_expert,
            'loy_expert' => $loy_expert,
            'doktarantura_expert' => $doktarantura_expert,
            'doktarantura_count' => $doktarantura_count
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
