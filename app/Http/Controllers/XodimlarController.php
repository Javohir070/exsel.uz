<?php

namespace App\Http\Controllers;

use App\Exports\XodimExport;
use App\Http\Requests\StorelXodimlarRequest;
use App\Http\Requests\UpdateXodimlarRequest;
use App\Models\Laboratory;
use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\XodimlarImport;

class XodimlarController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where("tashkilot_id", $user_id)->latest()->paginate(15);
        
        return view('admin.xodimlar.index',['xodimlars'=>$xodimlar]);
    }


    public function create()
    {
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.xodimlar.create', ['laboratorylar'=> $laboratorylar]);
    }


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
            "kafedralar_id" => auth()->user()->kafedralar_id,
            "fish" => $request->fish,
            "jshshir" => $request->jshshir ?? "yoq" ,
            "yil" => $request->yil ,
            "jinsi" => $request->jinsi ,
            "ish_tartibi" => $request->ish_tartibi ,
            "shtat_birligi" => $request->shtat_birligi ?? "yo'q" ,
            "urindoshlik_asasida" => $request->urindoshlik_asasida,
            "pedagoglik" => $request->pedagoglik,
            "lavozimi" => $request->lavozimi,
            "malumoti" => $request->malumoti,
            "uzbek_panlar_azosi" => $request->uzbek_panlar_azosi,
            "ilmiy_daraja" => $request->ilmiy_daraja,
            "ilmiy_daraja_yil" => $request->ilmiy_daraja_yil,
            "ilmiy_unvoni" => $request->ilmiy_unvoni,
            "ilmiy_unvoni_y" => $request->ilmiy_unvoni_y,
            "ixtisosligi" => $request->ixtisosligi,
            "phone" => $request->phone,
            "email" => $request->email,
            "laboratory_id" => $request->laboratory_id,
            'scopusda_url'=> $request->scopusda_url,
            'webOfscien_url'=> $request->webOfscien_url,
            'hirsh_indek'=> $request->hirsh_indek,
        ]);

        if(auth()->user()->hasRole('labaratoriyaga_masul')){
            return redirect()->route('lab_xodimlar.index')->with('status',"Ma\'lumotlar muvaffaqiyatli qo'shildi.");
        }else if(auth()->user()->hasRole('kafedra_mudiri')){
            return redirect("/kafedralar-user")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }else{
            return redirect("/xodimlar")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }
    }


    public function show(Xodimlar $xodimlar)
    {
        return view("admin.xodimlar.show",['xodimlar'=>$xodimlar]);
    }


    public function edit(Xodimlar $xodimlar)
    {
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.xodimlar.edit', ['xodimlar'=>$xodimlar, 'laboratorylar'=> $laboratorylar]);
    }


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
            "kafedralar_id" => auth()->user()->kafedralar_id,
            "fish" => $request->fish,
            "jshshir" => $request->jshshir ?? 'yoq',
            "yil" => $request->yil,
            "jinsi" => $request->jinsi,
            "ish_tartibi" => $request->ish_tartibi,
            "shtat_birligi" => $request->shtat_birligi ?? "yo'q",
            "urindoshlik_asasida" => $request->urindoshlik_asasida,
            "pedagoglik" => $request->pedagoglik,
            "lavozimi" => $request->lavozimi,
            "malumoti" => $request->malumoti,
            "uzbek_panlar_azosi" => $request->uzbek_panlar_azosi,
            "ilmiy_daraja" => $request->ilmiy_daraja,
            "ilmiy_daraja_yil" => $request->ilmiy_daraja_yil,
            "ilmiy_unvoni" => $request->ilmiy_unvoni,
            "ilmiy_unvoni_y" => $request->ilmiy_unvoni_y,
            "ixtisosligi" => $request->ixtisosligi,
            "phone" => $request->phone,
            "email" => $request->email,
            'scopusda_url'=> $request->scopusda_url,
            'webOfscien_url'=> $request->webOfscien_url,
            'hirsh_indek'=> $request->hirsh_indek,
        ]);
        if(auth()->user()->hasRole('labaratoriyaga_masul')){
            return redirect()->route('lab_xodimlar.index')->with('status',"Ma\'lumotlar muvaffaqiyatli yangilandi.");
        }else if(auth()->user()->hasRole('kafedra_mudiri')){
            return redirect("/kafedralar-user")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }else{
            return redirect("/xodimlar")->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
        }
    }


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
        ini_set('memory_limit', '1024M'); // Yoki kerakli miqdorda xotira limiti qo'ying
        ini_set('max_execution_time', '300'); // Kerak bo'lsa, vaqt limitini ham oshiring
        $fileName = 'Xodimlar_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new XodimExport, $fileName);
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

    public function reformatPhones()
    {
        Xodimlar::chunk(100, function ($employees) {
            foreach ($employees as $employee) {
                $employee->phone = $employee->phone; // Mutator yordamida formatlash
                $employee->save();
            }
        });

        return 'Telefon raqamlari muvaffaqiyatli formatlandi.';
    }


    //import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $fileName = time() . '-' . $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        Excel::import(new XodimlarImport, $request->file('file'));

        return redirect()->back()->with('status', 'Xodimlar muvaffaqiyatli yuklandi!');

    }

    public function deleteAll(Tashkilot $tashkilot)
    {
        // Tashkilotga tegishli barcha xodimlarni o'chirish
        $tashkilot->xodimlar()->delete();

        return redirect()->back()->with('status', 'Barcha xodimlar o‘chirildi.');
    }
}
