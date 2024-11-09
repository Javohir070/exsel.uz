<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Laboratory;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Models\Xodimlar;
use App\Models\Xujalik;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    
    public function index()
    {
        $laboratorys =Laboratory::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.labaratoriya.index", ["laboratorys"=> $laboratorys]);
    }

    public function laboratoriya()
    {
        $laboratorys =Laboratory::where("id",auth()->user()->laboratory_id)->get();
        
        return view("admin.labaratoriya.labaratoriya", ["laboratorys"=> $laboratorys]);
    }


    public function lab_biriktirilgan_xodimlar()
    {
        $lab_xodimlar = Xodimlar::where("laboratory_id",auth()->user()->laboratory_id)->paginate(20);
        $tashkilot_xodimlar = Xodimlar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.labaratoriya.labxodimlar", ["lab_xodimlar"=> $lab_xodimlar, 'tashkilot_xodimlar'=>$tashkilot_xodimlar]);
    }

    public function lab_biriktirilgan_ilmiyloyha()
    {
        $ilmiyloyiha = IlmiyLoyiha::where("laboratory_id",auth()->user()->laboratory_id)->paginate(20);
        $tashkilot_ilmiyloyiha = IlmiyLoyiha::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.labaratoriya.labilmiyloyhi", ["ilmiyloyiha"=> $ilmiyloyiha, "tashkilot_ilmiyloyiha"=>$tashkilot_ilmiyloyiha]);
    }

    public function lab_biriktirilgan_xujalik()
    {
        $xujalik = Xujalik::where("laboratory_id",auth()->user()->laboratory_id)->paginate(20);
        $tashkilot_xujalik = Xujalik::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.labaratoriya.labxujalik", ["xujalik"=> $xujalik, "tashkilot_xujalik"=> $tashkilot_xujalik]);
    }

    
    public function giveXodimToLab(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $xodimlarId = $request->input('xodimlarId', []);

        // Foydalanuvchining laboratory_id sini oling
        $laboratoryId = auth()->user()->laboratory_id;

        // Tanlangan IDlarga tegishli xodimlarni yangilash
        if (!empty($xodimlarId)) {
            Xodimlar::whereIn('id', $xodimlarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xodimlar muvaffaqiyatli yangilandi!');

    }

    public function giveXujalikToLab(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $xujaliklarId = $request->input('xujaliklarId', []);

        // Foydalanuvchining laboratory_id sini oling
        $laboratoryId = auth()->user()->laboratory_id;

        // Tanlangan IDlarga tegishli xujaliklarni yangilash
        if (!empty($xujaliklarId)) {
            Xujalik::whereIn('id', $xujaliklarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xujaliklar muvaffaqiyatli yangilandi!');

    }


    public function giveIlmiyLoyhaToLab(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $ilmiyloyhalarId = $request->input('ilmiyloyhalarId', []);

        // Foydalanuvchining laboratory_id sini oling
        $laboratoryId = auth()->user()->laboratory_id;

        // Tanlangan IDlarga tegishli ilmiyloyhalarni yangilash
        if (!empty($ilmiyloyhalarId)) {
            IlmiyLoyiha::whereIn('id', $ilmiyloyhalarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'ilmiyloyhalar muvaffaqiyatli yangilandi!');

    }



    public function create()
    {
        return view("admin.labaratoriya.create");
    }

    
    public function store(StoreLaboratoryRequest $request)
    {

        Laboratory::create([
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "name" => $request->name,
            "tash_yil" => $request->tash_yil,
            "address" => $request->address,
        ]);

        return redirect('/laboratory')->with("status","yuklandi");
    }

    
    public function show(Laboratory $laboratory)
    {
        //
    }

   
    public function edit(Laboratory $laboratory)
    {
        //
    }

    
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        //
    }

    
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->back()->with("status","o'chirildi");
    }
}
