<?php

namespace App\Http\Controllers;

use App\Models\Fakultetlar;
use App\Models\Kafedralar;
use App\Http\Requests\StoreKafedralarRequest;
use App\Http\Requests\UpdateKafedralarRequest;
use App\Models\User;

class KafedralarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorys = Kafedralar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.kafedralar.index", ["laboratorys"=> $laboratorys]);
    }


    public function kafedra()
    {
        $kafedra = Kafedralar::where("id",auth()->user()->kafedralar_id)->get();

        return view("admin.kafedralar.kafedra", ["kafedra"=> $kafedra]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultetlar = Fakultetlar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        return view("admin.kafedralar.create", ["fakultetlar"=>$fakultetlar]);
    }


    public function responsible_masullar()
    {
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function($user) {
            return $user->roles->contains('name', 'kafedra_mudiri');
        });


        return view("admin.kafedralar.masullar", ['masullar'=> $masullar]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKafedralarRequest $request)
    {
        Kafedralar::create([
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "name" => $request->name,
            'fakultetlar_id' => $request->fakultetlar_id,
            "tash_yil" => $request->tash_yil
        ]);

        return redirect('/kafedralar')->with("status",'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kafedralar $kafedralar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kafedralar $kafedralar)
    {
        $fakultetlar = Fakultetlar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        return view("admin.kafedralar.edit", ["kafedralar" => $kafedralar, "fakultetlar" => $fakultetlar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKafedralarRequest $request, Kafedralar $kafedralar)
    {
        $kafedralar->update([
            "name" => $request->name,
            'fakultetlar_id' => $request->fakultetlar_id,
            "tash_yil" => $request->tash_yil
        ]);

        return redirect('/kafedralar')->with("status",'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kafedralar $kafedralar)
    {
        $kafedralar->delete();

        return redirect()->back()->with("status",'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }
}
