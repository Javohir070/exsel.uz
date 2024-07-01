<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;

class XodimlarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        $user_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where("tashkilot_id",$user_id)->latest()->get();

        return view('admin.xodimlar.index',['xodimlars'=>$xodimlar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.xodimlar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Xodimlar::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish ,
            "jshshir" => $request->jshshir ,
            "yil" => $request->yil ,
            "jinsi" => $request->jinsi ,
            "ish_tartibi" => $request->ish_tartibi ,
            "shtat_birligi" => $request->shtat_birligi ,
            "urindoshlik_asasida" => $request->urindoshlik_asasida ,
            "pedagoglik" => $request->pedagoglik ,
            "lavozimi" => $request->lavozimi ,
            "malumoti" => $request->malumoti ,
            "uzbek_panlar_azosi" => $request->uzbek_panlar_azosi ,
            "ilmiy_daraja" => $request->ilmiy_daraja ,
            "ilmiy_daraja_yil" => $request->ilmiy_daraja_yil ,
            "ilmiy_unvoni" => $request->ilmiy_unvoni ,
            "ilmiy_unvoni_y" => $request->ilmiy_unvoni_y ,
            "ixtisosligi" => $request->ixtisosligi ,
            "phone" => $request->phone,
            "email" => $request->email ,
        ]);

        return redirect("/xodimlar")->with('status', "malumot qo'shildi");
    }

    /**
     * Display the specified resource.
     */
    public function show(Xodimlar $xodimlar)
    {
        return view("admin.xodimlar.show",['xodimlar'=>$xodimlar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Xodimlar $xodimlar)
    {
        return view('admin.xodimlar.edit', ['xodimlar'=>$xodimlar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Xodimlar $xodimlar)
    {
        $xodimlar->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish ,
            "jshshir" => $request->jshshir ,
            "yil" => $request->yil ,
            "jinsi" => $request->jinsi ,
            "ish_tartibi" => $request->ish_tartibi ,
            "shtat_birligi" => $request->shtat_birligi ,
            "urindoshlik_asasida" => $request->urindoshlik_asasida ,
            "pedagoglik" => $request->pedagoglik ,
            "lavozimi" => $request->lavozimi ,
            "malumoti" => $request->malumoti ,
            "uzbek_panlar_azosi" => $request->uzbek_panlar_azosi ,
            "ilmiy_daraja" => $request->ilmiy_daraja ,
            "ilmiy_daraja_yil" => $request->ilmiy_daraja_yil ,
            "ilmiy_unvoni" => $request->ilmiy_unvoni ,
            "ilmiy_unvoni_y" => $request->ilmiy_unvoni_y ,
            "ixtisosligi" => $request->ixtisosligi ,
            "phone" => $request->phone,
            "email" => $request->email ,
        ]);

        return redirect("/xodimlar")->with('status', "malumot qo'shildi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Xodimlar $xodimlar)
    {
        $xodimlar->delete();

        return redirect()->back();
    }

    public function barcha_xodimlar()
    {
       $xodimlar_barchasi = Xodimlar::all();
        
       return view("admin.xodimlar.xodimlar",['xodimlar_barchasi'=>$xodimlar_barchasi]);
    }
}
