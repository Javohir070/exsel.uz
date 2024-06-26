<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

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

        return view('admin.tashkilot.index', ['tashkilot'=>$tashkilot]);
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
    public function store(Request $request)
    {
        Tashkilot::create([
            "name" => $request->name,
            "name_qisqachasi" => $request->name_qisqachasi,
            "tash_yil" => $request->tash_yil,
            "yur_manzil" => $request->yur_manzil,

            "viloyat" => $request->viloyat ?? "malumot yuq",
            "tuman" => $request->tuman ?? "malumot yuq",
            "paoliyat_manzil" => $request->paoliyat_manzil ?? "malumot yuq",
            "phone" => $request->phone ?? "malumot yuq",
            "email" => $request->email ?? "malumot yuq",
            "web_sayti" => $request->web_sayti ?? "malumot yuq",
            "turi" => $request->turi ?? "malumot yuq",
            "xarajatlar" => $request->xarajatlar ?? "malumot yuq",
            "shtat_bir" => $request->shtat_bir ?? "malumot yuq",
            "tash_xodimlar" => $request->tash_xodimlar ?? "malumot yuq",
            "ilmiy_xodimlar" => $request->ilmiy_xodimlar ?? "malumot yuq",
            "boshqariv" => $request->boshqariv ?? "malumot yuq",
            "stir_raqami" => $request->stir_raqami ?? "malumot yuq",
            "bank" => $request->bank ?? "malumot yuq",
        ]);

        return redirect('/tashkilot');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tashkilot $tashkilot)
    {
        return view('admin.tashkilot.show',['tashkilot'=>$tashkilot]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tashkilot $tashkilot)
    {
        return view('admin.tashkilot.edit',['tashkilot'=>$tashkilot]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tashkilot $tashkilot)
    {
        $tashkilot->update([
            "name" => $request->name,
            "name_qisqachasi" => $request->name_qisqachasi,
            "tash_yil" => $request->tash_yil,
            "yur_manzil" => $request->yur_manzil,
            "viloyat" => $request->viloyat,
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
        ]);

        return redirect('/tashkilot');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tashkilotlar()
    {
        $tashkilotlar = Tashkilot::all();
        return view('admin.tashkilot.tashkilotlar',['tashkilotlar'=>$tashkilotlar]);

    }
}
