<?php

namespace App\Http\Controllers;

use App\Models\Fakultetlar;
use App\Http\Requests\StoreFakultetlarRequest;
use App\Http\Requests\UpdateFakultetlarRequest;

class FakultetlarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorys =Fakultetlar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.fakultetlar.index", ["laboratorys"=> $laboratorys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.fakultetlar.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFakultetlarRequest $request)
    {
        Fakultetlar::create([
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "name" => $request->name,
            "tash_yil" => $request->tash_yil,
        ]);

        return redirect('/fakultetlar')->with("status",'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultetlar $fakultetlar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultetlar $fakultetlar)
    {
        return view("admin.fakultetlar.edit", ["fakultetlar" => $fakultetlar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFakultetlarRequest $request, Fakultetlar $fakultetlar)
    {
        $fakultetlar->update($request->toArray());

        return redirect('/fakultetlar')->with("status",'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultetlar $fakultetlar)
    {
        $fakultetlar->delete();

        return redirect('/fakultetlar')->with("status",'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }
}
