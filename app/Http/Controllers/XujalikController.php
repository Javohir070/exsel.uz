<?php

namespace App\Http\Controllers;

use App\Models\Xujalik;
use App\Http\Requests\StoreXujalikRequest;
use App\Http\Requests\UpdateXujalikRequest;
use Illuminate\Http\Request;

class XujalikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $xujalik  = Xujalik::where('tashkilot_id', $tashRId)->get();
        return view('admin.xujalik.index' ,['xujalik' => $xujalik]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.xujalik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Xujalik::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "ishlanma_nomi" =>$request->ishlanma_nomi,
            "intellektual_raqami" =>$request->intellektual_raqami,
            "intellektual_sana" =>$request->intellektual_sana ,
            "ishlanma_mavzu" =>$request->ishlanma_mavzu ,
            "ishlanma_turi" =>$request->ishlanma_turi ,
            "lisenzion" => $request->lisenzion,
            "sh_raqami" =>$request->sh_raqami ,
            "sh_sanasi" =>$request->sh_sanasi ,
            "ilmiy_nomi" =>$request->ilmiy_nomi ,
            "stir" =>$request->stir ,
            "sh_summa" =>$request->sh_summa ,
            "shkelib_sana" =>$request->shkelib_sana ,
            "shkelib_summa" =>$request->shkelib_summa ,
        ]);

        return redirect('/xujalik')->with('status' , 'siz yuborgan malumot qoshildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Xujalik $xujalik)
    {
        return view('admin.xujalik.show',['xujalik'=>$xujalik]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Xujalik $xujalik)
    {
        return view('admin.xujalik.edit',['xujalik'=>$xujalik]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Xujalik $xujalik)
    {

        $xujalik->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "ishlanma_nomi" =>$request->ishlanma_nomi,
            "intellektual_raqami" =>$request->intellektual_raqami,
            "intellektual_sana" =>$request->intellektual_sana ,
            "ishlanma_mavzu" =>$request->ishlanma_mavzu ,
            "ishlanma_turi" =>$request->ishlanma_turi ,
            "lisenzion" => $request->lisenzion,
            "sh_raqami" =>$request->sh_raqami ,
            "sh_sanasi" =>$request->sh_sanasi ,
            "ilmiy_nomi" =>$request->ilmiy_nomi ,
            "stir" =>$request->stir ,
            "sh_summa" =>$request->sh_summa ,
            "shkelib_sana" =>$request->shkelib_sana ,
            "shkelib_summa" =>$request->shkelib_summa ,
        ]);

        return redirect('/xujalik')->with('status' , 'siz yuborgan malumot ozgartirldi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Xujalik $xujalik)
    {
        //
    }

    public function xujaliklar()
    {
        $xujaliklar = Xujalik::all();
        return view('admin.xujalik.ilmiyloyihalar',['xujaliklar'=>$xujaliklar]);
    }
}