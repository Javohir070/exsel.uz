<?php

namespace App\Http\Controllers;

use App\Models\IlmiybnTaminlanga;
use App\Http\Requests\StoreIlmiybnTaminlangaRequest;
use App\Http\Requests\UpdateIlmiybnTaminlangaRequest;
use App\Models\Umumiyyil;
use App\Models\Yillar;
use Illuminate\Http\Request;

class IlmiybnTaminlangaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $loyihdaraja = IlmiybnTaminlanga::where('tashkilot_id', $tashRId)->paginate(20);
        return view('admin.ilmiydaraja.index',['loyihdaraja'=>$loyihdaraja]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ilmiydaraja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIlmiybnTaminlangaRequest $request)
    {
        $yillar = Yillar::create([
            "y2017" => $request->y2017 ?? 0,
            "y2018" => $request->y2018 ?? 0,
            "y2019" => $request->y2019 ?? 0,
            "y2020" => $request->y2020 ?? 0,
            "y2021" => $request->y2021 ?? 0,
            "y2022" => $request->y2022 ?? 0,
            "y2023" => $request->y2023 ?? 0,
            "y2024" => $request->y2024 ?? 0,
        ]);

        $umumiyyil = Umumiyyil::create([
            "y2017" => $request->yil2017 ?? 0,
            "y2018" => $request->yil2018 ?? 0,
            "y2019" => $request->yil2019 ?? 0,
            "y2020" => $request->yil2020 ?? 0,
            "y2021" => $request->yil2021 ?? 0,
            "y2022" => $request->yil2022 ?? 0,
            "y2023" => $request->yil2023 ?? 0,
            "y2024" => $request->yil2024 ?? 0,
        ]);

        IlmiybnTaminlanga::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "yillar_id" => $yillar->id,
            "umumiyyil_id" => $umumiyyil->id,
            "xodimlar_jami" => $request->xodimlar_jami,
            "ilmiy_xodimlar" => $request->ilmiy_xodimlar,
            "name" => $request->name,
            "turi" => $request->turi,
            "moliyal_jami" => $request->moliyal_jami,
            "xodimganisbat_jami" => $request->xodimganisbat_jami,
        ]);

        return redirect('/ilmiydaraja')->with('status', 'Ma\'lumotlar muvaffaqiyatli qoshildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IlmiybnTaminlanga $ilmiydaraja)
    {
        return view('admin.ilmiydaraja.show',['ilmiydaraja'=>$ilmiydaraja]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IlmiybnTaminlanga $ilmiydaraja)
    {
        return view('admin.ilmiydaraja.edit',['ilmiydaraja'=>$ilmiydaraja]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreIlmiybnTaminlangaRequest $request, IlmiybnTaminlanga $ilmiydaraja)
    {
        $ilmiybnTaminlanga = $ilmiydaraja;
        $yillar = Yillar::findOrFail($ilmiybnTaminlanga->yillar_id);
        $umumiyyil = Umumiyyil::findOrFail($ilmiybnTaminlanga->umumiyyil_id);

        $yillar->update([
            "y2017" => $request->y2017 ?? 0 ,
            "y2018" => $request->y2018 ?? 0 ,
            "y2019" => $request->y2019 ?? 0 ,
            "y2020" => $request->y2020 ?? 0 ,
            "y2021" => $request->y2021 ?? 0 ,
            "y2022" => $request->y2022 ?? 0 ,
            "y2023" => $request->y2023 ?? 0 ,
            "y2024" => $request->y2024 ?? 0 ,
        ]);

        $umumiyyil->update([
            "y2017" => $request->yil2017 ?? 0 ,
            "y2018" => $request->yil2018 ?? 0 ,
            "y2019" => $request->yil2019 ?? 0 ,
            "y2020" => $request->yil2020 ?? 0 ,
            "y2021" => $request->yil2021 ?? 0 ,
            "y2022" => $request->yil2022 ?? 0 ,
            "y2023" => $request->yil2023 ?? 0 ,
            "y2024" => $request->yil2024 ?? 0 ,
        ]);

        $ilmiybnTaminlanga->update([
            "xodimlar_jami" => $request->xodimlar_jami,
            "ilmiy_xodimlar" => $request->ilmiy_xodimlar,
            "name" => $request->name,
            "turi" => $request->turi,
            "moliyal_jami" => $request->moliyal_jami,
            "xodimganisbat_jami" => $request->xodimganisbat_jami,
        ]);

        return redirect()->route('ilmiydaraja.index')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IlmiybnTaminlanga $ilmiydaraja)
    {
        $ilmiydaraja->delete();
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
        
    }

    public function ilmiydarajalar()
    {
        $ilmiydarajalar = IlmiybnTaminlanga::paginate(25);

        return view('admin.ilmiydaraja.ilmiyloyihalar',['ilmiydarajalar'=>$ilmiydarajalar]);
    }
}
