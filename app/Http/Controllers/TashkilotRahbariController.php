<?php

namespace App\Http\Controllers;

use App\Models\TashkilotRahbari;
use App\Http\Requests\StoreTashkilotRahbariRequest;
use App\Http\Requests\UpdateTashkilotRahbariRequest;
use Illuminate\Http\Request;

class TashkilotRahbariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $tash_rahbar = TashkilotRahbari::where('tashkilot_id', $tashRId)->get();
        return view('admin.tashkilotrahbari.index', ['tash_rahbar'=>$tash_rahbar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tashkilotrahbari.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TashkilotRahbari::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish,
            "email" => $request->email,
            "phone" => $request->phone,
            "u_fish" => $request->u_fish,
            "u_email" => $request->u_email,
            "u_phone" => $request->u_phone,
        ]);

        return redirect('/tashkilotrahbari')->with("status", "siz yuklagan mauumoat qo'shildi");
    }

    /**
     * Display the specified resource.
     */
    public function show(TashkilotRahbari $tashkilotrahbari)
    {
        return view('admin.tashkilotrahbari.show',['tashkilotrahbari'=>$tashkilotrahbari]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tashkilotrahbari)
    {
        $tashkilot = TashkilotRahbari::find($tashkilotrahbari);
        return view('admin.tashkilotrahbari.edit',['tashkilot'=>$tashkilot]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TashkilotRahbari $tashkilotrahbari)
    {
        $tashkilotrahbari->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish,
            "email" => $request->email,
            "phone" => $request->phone,
            "u_fish" => $request->u_fish,
            "u_email" => $request->u_email,
            "u_phone" => $request->u_phone,
        ]);

        return redirect('/tashkilotrahbari')->with("status", "siz yuklagan mauumoat qo'shildi");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TashkilotRahbari $tashkilotRahbari)
    {
        //
    }

    public function tashkilotrahbarilar()
    {
        $tashkilot_rahbarilar = TashkilotRahbari::all();
        return view("admin.tashkilotrahbari.tashkilotrahbarilar",['tashkilot_rahbarilar'=>$tashkilot_rahbarilar]);
    }
}
