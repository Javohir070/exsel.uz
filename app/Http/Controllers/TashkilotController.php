<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

class TashkilotController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view tashkilotlar', ['only' => ['index']]);
        $this->middleware('permission:create tashkilotlar', ['only' => ['create','store']]);
        $this->middleware('permission:update tashkilotlar', ['only' => ['update','edit']]);
        $this->middleware('permission:delete tashkilotlar', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashkilots = Tashkilot::all();

        return view('admin.tashkilot.index', ['tashkilots'=>$tashkilots]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tashkilot.create');
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
     * Display the specified resource.
     */
    public function show(Tashkilot $tashkilot)
    {
        return view('admin.tashkilot.show',['tashkilot'=>$tashkilot]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
