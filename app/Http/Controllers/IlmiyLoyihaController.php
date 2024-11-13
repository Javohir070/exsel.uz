<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Http\Requests\StoreIlmiyLoyihaRequest;
use App\Http\Requests\UpdateIlmiyLoyihaRequest;
use App\Models\Laboratory;
use App\Models\Tashkilot;
use App\Models\Umumiyyil;
use Illuminate\Http\Request;
use App\Exports\IlmiyLoyihasExport;
use Maatwebsite\Excel\Facades\Excel;
class IlmiyLoyihaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $ilmiyloyiha = IlmiyLoyiha::where('tashkilot_id', $tashRId)->latest()->paginate(20);

        return view('admin.ilmiyloyiha.index',['ilmiyloyiha'=>$ilmiyloyiha]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.ilmiyloyiha.create',['tashkilots'=>$tashkilots, 'laboratorylar'=> $laboratorylar]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIlmiyLoyihaRequest $request)
    {
        $umumiyyil = Umumiyyil::create([
            "y2017" => $request->y2017 ?? 0,
            "y2018" => $request->y2018 ?? 0,
            "y2019" => $request->y2019 ?? 0,
            "y2020" => $request->y2020 ?? 0,
            "y2021" => $request->y2021 ?? 0,
            "y2022" => $request->y2022 ?? 0,
            "y2023" => $request->y2023 ?? 0,
            "y2024" => $request->y2024 ?? 0,
        ]);
        IlmiyLoyiha::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => $request->tashkilot_id ?? auth()->user()->tashkilot_id,
            "umumiyyil_id" =>$umumiyyil->id,
            "mavzusi" => $request->mavzusi,
            "turi" => $request->turi,
            "dastyri" => $request->dastyri ?? "yoq",
            "q_hamkor_tashkilot" => $request->q_hamkor_tashkilot ?? "yoq",
            "hamkor_davlat" => $request->hamkor_davlat ?? "yoq",
            "muddat" => $request->muddat ?? "yoq",
            "bosh_sana" => $request->bosh_sana,
            "tug_sana" => $request->tug_sana,
            "pan_yunalish" => $request->pan_yunalish,
            "rahbar_name" => $request->rahbar_name,
            "raqami" => $request->raqami,
            "sanasi" => $request->sanasi ?? "yoq",
            "sum" => $request->sum,
            "umumiy_mablag" => $request->sum ?? 'yoq',
            "olingan_natija" => $request->olingan_natija ?? "yoq",
            "joriy_holati" => $request->joriy_holati ?? "yoq" ,
            "tijoratlashtirish" => $request->tijoratlashtirish ?? "yoq",
            "laboratory_id" => $request->laboratory_id,
        ]);
        if(auth()->user()->hasRole('labaratoriyaga_masul')){
            return redirect()->route('lab_ilmiyloyiha.index')->with('status',"Ma\'lumotlar muvaffaqiyatli qo'shildi.");
        }else{
            return redirect('/ilmiyloyiha')->with('status','Ma\'lumotlar muvaffaqiyatli qoshildi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(IlmiyLoyiha $ilmiyloyiha)
    {
        return view('admin.ilmiyloyiha.show',['ilmiyloyiha'=>$ilmiyloyiha]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IlmiyLoyiha $ilmiyloyiha)
    {
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.ilmiyloyiha.edit',['ilmiyloyiha'=>$ilmiyloyiha,'tashkilots'=>$tashkilots, 'laboratorylar'=> $laboratorylar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIlmiyLoyihaRequest $request, IlmiyLoyiha $ilmiyloyiha)
    {

        $umumiyyil = Umumiyyil::findOrFail($ilmiyloyiha->umumiyyil_id);
        $umumiyyil->update([
            "y2017" => $request->y2017 ?? 0 ,
            "y2018" => $request->y2018 ?? 0 ,
            "y2019" => $request->y2019 ?? 0 ,
            "y2020" => $request->y2020 ?? 0 ,
            "y2021" => $request->y2021 ?? 0 ,
            "y2022" => $request->y2022 ?? 0 ,
            "y2023" => $request->y2023 ?? 0 ,
            "y2024" => $request->y2024 ?? 0 ,
        ]);
        $ilmiyloyiha->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => $request->tashkilot_id ?? auth()->user()->tashkilot_id,
            "umumiyyil_id" =>$umumiyyil->id,
            "mavzusi" => $request->mavzusi,
            "turi" => $request->turi ?? "yo'q",
            "dastyri" => $request->dastyri,
            "q_hamkor_tashkilot" => $request->q_hamkor_tashkilot ?? "yo'q",
            "hamkor_davlat" => $request->hamkor_davlat ?? "yo'q",
            "muddat" => $request->muddat,
            "bosh_sana" => $request->bosh_sana,
            "tug_sana" => $request->tug_sana,
            "pan_yunalish" => $request->pan_yunalish,
            "rahbar_name" => $request->rahbar_name,
            "raqami" => $request->raqami,
            "sanasi" => $request->sanasi,
            "sum" => $request->sum,
            "umumiy_mablag" => $request->sum,
            "olingan_natija" => $request->olingan_natija,
            "joriy_holati" => $request->joriy_holati,
            "tijoratlashtirish" => $request->tijoratlashtirish,
            "laboratory_id" => $request->laboratory_id,
        ]);
        if(auth()->user()->hasRole('labaratoriyaga_masul')){
            return redirect()->route('lab_ilmiyloyiha.index')->with('status',"Ma\'lumotlar muvaffaqiyatli yangilandi.");
        }else{
            return redirect()->route("ilmiyloyiha.index")->with('status','Ma\'lumotlar muvaffaqiyatli yangilandi');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IlmiyLoyiha $ilmiyloyiha)
    {
        $ilmiyloyiha->delete();
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');

    }

    public function ilmiyloyihalar()
    {
        $ilmiyloyihalar = IlmiyLoyiha::paginate(25);
        return view("admin.ilmiyloyiha.ilmiyloyihalar",['ilmiyloyihalar'=>$ilmiyloyihalar]);
    }
    public function exportilmiy() 
    {
        $fileName = 'Ilmiyloyihalar' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new IlmiyLoyihasExport, $fileName);
    }

    public function searchloyiha(Request $request)
    {
        $querysearch = $request->input('query');
        $ilmiyloyiha = IlmiyLoyiha::where('mavzusi','like','%'.$querysearch.'%')
                ->orWhere('turi','like','%'.$querysearch.'%')
                ->orWhere('rahbar_name','like','%'.$querysearch.'%')
                ->paginate(10);
        return view('admin.ilmiyloyiha.search_results', compact('ilmiyloyiha'));
    }
}
