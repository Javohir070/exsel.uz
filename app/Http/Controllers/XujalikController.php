<?php

namespace App\Http\Controllers;

use App\Exports\XujalikExport;
use App\Models\Xujalik;
use App\Http\Requests\StoreXujalikRequest;
use App\Http\Requests\UpdateXujalikRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class XujalikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $xujalik  = Xujalik::where('tashkilot_id', $tashRId)->paginate(20);
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
    public function store(StoreXujalikRequest $request)
    {

        Xujalik::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "ishlanma_nomi" =>$request->ishlanma_nomi,
            "intellektual_raqami" =>$request->intellektual_raqami ?? "yoq",
            "intellektual_sana" =>$request->intellektual_sana ?? "yoq" ,
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

        return redirect('/xujalik')->with('status', "Ma\'lumotlar muvaffaqiyatli qo'shildi.");
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
    public function update(StoreXujalikRequest $request, Xujalik $xujalik)
    {

        $xujalik->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "ishlanma_nomi" =>$request->ishlanma_nomi,
            "intellektual_raqami" =>$request->intellektual_raqami ?? "yoq",
            "intellektual_sana" =>$request->intellektual_sana ?? "yoq",
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

        return redirect('/xujalik')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Xujalik $xujalik)
    {
        $xujalik->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }

    public function xujaliklar()
    {
        $xujaliklar = Xujalik::paginate(25);
        return view('admin.xujalik.ilmiyloyihalar',['xujaliklar'=>$xujaliklar]);
    }

    public function exporxujaliklar()
    {
        ini_set('memory_limit', '512M'); // Yoki kerakli miqdorda xotira limiti qo'ying
        ini_set('max_execution_time', '300'); // Kerak bo'lsa, vaqt limitini ham oshiring
        $fileName = 'Xujaliklar' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new XujalikExport, $fileName);
    }
}
