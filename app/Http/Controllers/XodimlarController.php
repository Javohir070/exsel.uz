<?php

namespace App\Http\Controllers;

use App\Exports\XodimExport;
use App\Http\Requests\StorelXodimlarRequest;
use App\Http\Requests\UpdateXodimlarRequest;
use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

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
        if($request->ish_tartibi == 'Soatbay'){
            $request->validate([
                'shtat_birligi' => 'nullable|max:255',
            ]);
        }else{
            $request->validate([
                'shtat_birligi' => 'required|max:255',
            ]);
        }
        Xodimlar::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish,
            "jshshir" => $request->jshshir ?? "yoq" ,
            "yil" => $request->yil ,
            "jinsi" => $request->jinsi ,
            "ish_tartibi" => $request->ish_tartibi ,
            "shtat_birligi" => $request->shtat_birligi ?? "yo'q" ,
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
        if($request->ish_tartibi == 'Soatbay'){
            $request->validate([
                'shtat_birligi' => 'nullable|max:255',
            ]);
        }else{
            $request->validate([
                'shtat_birligi' => 'required|max:255',
            ]);
        }
        $xodimlar->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "fish" => $request->fish ,
            "jshshir" => $request->jshshir ?? 'yoq',
            "yil" => $request->yil ,
            "jinsi" => $request->jinsi ,
            "ish_tartibi" => $request->ish_tartibi ,
            "shtat_birligi" => $request->shtat_birligi ?? "yo'q" ,
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

    public function exporxodimlar()
    {
        return Excel::download(new XodimExport,'xodimlar.xlsx');
    }

    public function searchxodimlar(Request $request)
    {
        $querysearch = $request->input('query');
        $xodimlar = Xodimlar::where('fish','like','%'.$querysearch.'%')
                ->orWhere('lavozimi','like','%'.$querysearch.'%')
                ->orWhere('email','like','%'.$querysearch.'%')
                ->paginate(10);
        return view('admin.xodimlar.search_resultsbarchax', compact('xodimlar'));
    }

    public function searchEmployees(Request $request)
    {
        $searchTerm = $request->input('search');
        $tashkilot_id = auth()->user()->tashkilot_id;

        // Tashkilotni olish va unga tegishli xodimlarni qidirish
        $tashkilot = Tashkilot::findOrFail($tashkilot_id);

        // Xodimlarni qidirish va natijani cheklash
        $xodimlars = $tashkilot->xodimlar()
            ->where(function($query) use ($searchTerm) {
                $query->where('fish', 'like', '%'.$searchTerm.'%')
                    ->orWhere('lavozimi', 'like', '%'.$searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$searchTerm.'%');
            })
            ->get();

        // Natijani qaytarish
        return view('admin.xodimlar.search_results', ['xodimlar' => $xodimlars]);
    }
}
