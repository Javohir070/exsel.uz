<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelXodimlarRequest;
use App\Http\Requests\UpdateXodimlarRequest;
use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class XodimlarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        $user_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where("tashkilot_id", $user_id)->latest()->paginate(15);
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
    public function store(StorelXodimlarRequest $request)
    {
        if($request->ish_tartibi == 'O‘rindoshlik'){
            $request->validate([
                'jshshir' => 'required|string|min:14',
            ]);
        }else{
            $request->validate([
                'jshshir' => 'required|string|min:14|unique:xodimlars',
            ]);
        }
        Xodimlar::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish,
            "jshshir" => $request->jshshir ,
            "yil" => $request->yil ,
            "jinsi" => $request->jinsi ,
            "ish_tartibi" => $request->ish_tartibi ,
            "shtat_birligi" => $request->shtat_birligi ,
            "urindoshlik_asasida" => $request->urindoshlik_asasida ?? "yo'q" ,
            "pedagoglik" => $request->pedagoglik ,
            "lavozimi" => $request->lavozimi ,
            "malumoti" => $request->malumoti ?? "yo'q",
            "uzbek_panlar_azosi" => $request->uzbek_panlar_azosi ?? "yo'q" ,
            "ilmiy_daraja" => $request->ilmiy_daraja ?? "yo'q" ,
            "ilmiy_daraja_yil" => $request->ilmiy_daraja_yil ?? "yo'q" ,
            "ilmiy_unvoni" => $request->ilmiy_unvoni ?? "yo'q" ,
            "ilmiy_unvoni_y" => $request->ilmiy_unvoni_y ?? "yo'q" ,
            "ixtisosligi" => $request->ixtisosligi ?? "yo'q" ,
            "phone" => $request->phone,
            "email" => $request->email ,
        ]);
        return redirect("/xodimlar")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
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
    public function update(UpdateXodimlarRequest $request, Xodimlar $xodimlar)
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
            "urindoshlik_asasida" => $request->urindoshlik_asasida ?? "yo'q",
            "pedagoglik" => $request->pedagoglik ,
            "lavozimi" => $request->lavozimi ,
            "malumoti" => $request->malumoti ?? "yo'q" ,
            "uzbek_panlar_azosi" => $request->uzbek_panlar_azosi ?? "yo'q" ,
            "ilmiy_daraja" => $request->ilmiy_daraja ?? "yo'q" ,
            "ilmiy_daraja_yil" => $request->ilmiy_daraja_yil ?? "yo'q" ,
            "ilmiy_unvoni" => $request->ilmiy_unvoni ?? "yo'q" ,
            "ilmiy_unvoni_y" => $request->ilmiy_unvoni_y ?? "yo'q" ,
            "ixtisosligi" => $request->ixtisosligi ?? "yo'q" ,
            "phone" => $request->phone,
            "email" => $request->email ,
        ]);

        return redirect("/xodimlar")->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Xodimlar $xodimlar)
    {
        $xodimlar->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }

    public function barcha_xodimlar()
    {
       $xodimlar_barchasi = Xodimlar::paginate(25);
       return view("admin.xodimlar.xodimlar",['xodimlar_barchasi'=>$xodimlar_barchasi]);
    }
}
