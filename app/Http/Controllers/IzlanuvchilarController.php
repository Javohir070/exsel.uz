<?php

namespace App\Http\Controllers;

use App\Models\Izlanuvchilar;
use App\Http\Requests\StoreIzlanuvchilarRequest;
use App\Http\Requests\UpdateIzlanuvchilarRequest;

class IzlanuvchilarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $izlanuvchilar = Izlanuvchilar::where('laboratory_id', auth()->user()->laboratory_id)->paginate(20);

        return view("admin.izlanuvchilar.index", ["izlanuvchilar"=> $izlanuvchilar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.izlanuvchilar.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIzlanuvchilarRequest $request)
    {
        

        Izlanuvchilar::create([
            "user_id" => auth()->user()->id,
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "laboratory_id" => auth()->user()->laboratory_id,
            "fish" => $request->fish, 
            "jshshir" => $request->jshshir, 
            "pasport_seriya" => $request->pasport_seriya, 
            "jinsi" => $request->jinsi, 
            "talim_turi" => $request->talim_turi, 
            "ixtisoslik" => $request->ixtisoslik, 
            "qabul_qilgan_yil" => $request->qabul_qilgan_yil, 
            "mavzusi" => $request->mavzusi, 
            "phone" => $request->phone, 
            "loyihada_ishtiroki" => $request->loyihada_ishtiroki, 
            "stir" => $request->stir, 
        ]);

        return redirect()->route("izlanuvchilar.index")->with("status","yuklandi");
    }

    /**
     * Display the specified resource.
     */
    public function show(Izlanuvchilar $izlanuvchilar)
    {
        return view("admin.izlanuvchilar.show", ["izlanuvchilar" => $izlanuvchilar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Izlanuvchilar $izlanuvchilar)
    {
        return view("admin.izlanuvchilar.edit", ["izlanuvchilar"=> $izlanuvchilar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIzlanuvchilarRequest $request, Izlanuvchilar $izlanuvchilar)
    {
        $izlanuvchilar->update($request->toArray());

        return redirect()->route("izlanuvchilar.index")->with("status","yangilandi");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Izlanuvchilar $izlanuvchilar)
    {
        //
    }
}