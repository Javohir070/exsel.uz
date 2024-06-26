<?php

namespace App\Http\Controllers;

use App\Models\IqtisodiyMoliyaviy;
use App\Http\Requests\StoreIqtisodiyMoliyaviyRequest;
use App\Http\Requests\UpdateIqtisodiyMoliyaviyRequest;
use Illuminate\Http\Request;

class IqtisodiyMoliyaviyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $iqtisodiy = IqtisodiyMoliyaviy::where('tashkilot_id', $tashRId)->get();
        return view("admin.iqtisodiy.index",['iqtisodiy' => $iqtisodiy]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.iqtisodiy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        IqtisodiyMoliyaviy::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "kadastr_raqami" => $request->kadastr_raqami, 
            "u_maydoni" => $request->u_maydoni, 
            "taj_maydonlari" => $request->taj_maydonlari, 
            "binolar_soni" => $request->binolar_soni, 
            "auditoriya_sigimi" => $request->auditoriya_sigimi, 
            "k_xaj_auditor_soni" => $request->k_xaj_auditor_soni, 
            "pondi_miqdori" => $request->pondi_miqdori, 
            "ilmiyp_bulinalar" => $request->ilmiyp_bulinalar, 
            "gaz" => $request->gaz, 
            "elektr" => $request->elektr, 
            "suv" => $request->suv, 
            "kanalizasiya" => $request->kanalizasiya, 
            "internet" => $request->internet, 
        ]);

        return redirect('/iqtisodiy')->with('status', "siz yuborgan malutot yuklandi qo'shildi");
    }

    /**
     * Display the specified resource.
     */
    public function show(IqtisodiyMoliyaviy $iqtisodiy)
    {
        return view('admin.iqtisodiy.show',['iqtisodiy'=>$iqtisodiy]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IqtisodiyMoliyaviy $iqtisodiy)
    {

        return view('admin.iqtisodiy.edit', ['iqtisodiy'=>$iqtisodiy]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IqtisodiyMoliyaviy $iqtisodiy)
    {
        $iqtisodiy->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "kadastr_raqami" => $request->kadastr_raqami, 
            "u_maydoni" => $request->u_maydoni, 
            "taj_maydonlari" => $request->taj_maydonlari, 
            "binolar_soni" => $request->binolar_soni, 
            "auditoriya_sigimi" => $request->auditoriya_sigimi, 
            "k_xaj_auditor_soni" => $request->k_xaj_auditor_soni, 
            "pondi_miqdori" => $request->pondi_miqdori, 
            "ilmiyp_bulinalar" => $request->ilmiyp_bulinalar, 
            "gaz" => $request->gaz, 
            "elektr" => $request->elektr, 
            "suv" => $request->suv, 
            "kanalizasiya" => $request->kanalizasiya, 
            "internet" => $request->internet, 
        ]);

        return redirect('/iqtisodiy')->with('status', "siz yuborgan malutot yuklandi qo'shildi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IqtisodiyMoliyaviy $iqtisodiyMoliyaviy)
    {
        //
    }

    public function iqtisodiylar()
    {
        $iqtisodiylar = IqtisodiyMoliyaviy::all();
        return view("admin.iqtisodiy.iqtisodiylar",['iqtisodiylar'=>$iqtisodiylar]);
    }
}
