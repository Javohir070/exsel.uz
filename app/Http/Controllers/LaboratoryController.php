<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Izlanuvchilar;
use App\Models\Laboratory;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Models\User;
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

    public function masullar()
    {
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function($user) {
            return $user->roles->contains('name', 'labaratoriyaga_masul');
        });

        
        return view("admin.labaratoriya.masullar", ['masullar'=> $masullar]);
    }


    public function laboratoriyalari()
    {
        $laboratoriyalari =laboratory::paginate(25);

        return view('admin.labaratoriya.laboratoriyalari', ['laboratoriyalari'=> $laboratoriyalari]);
    }

    public function laboratoriya()
    {
        $laboratorys =Laboratory::where("id",auth()->user()->laboratory_id)->get();
        $lab_xodimlar = Xodimlar::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_xujalik = Xujalik::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_ilmiyLoyiha = IlmiyLoyiha::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_izlanuvchilar = Izlanuvchilar::where('laboratory_id', auth()->user()->laboratory_id)->count();
        return view("admin.labaratoriya.labaratoriya", [
                "laboratorys"=> $laboratorys,
                'lab_izlanuvchilar' => $lab_izlanuvchilar,
                'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
                'lab_xujalik' => $lab_xujalik,
                'lab_xodimlar' => $lab_xodimlar,
            ]);
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
            "tavsif" => $request->tavsif,
        ]);

        return redirect('/laboratory')->with("status",'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    
    public function show(Laboratory $laboratory)
    {
        $lab_xodimlar = Xodimlar::where('laboratory_id', $laboratory->id)->count();
        $lab_xujalik = Xujalik::where('laboratory_id', $laboratory->id)->count();
        $lab_ilmiyLoyiha = IlmiyLoyiha::where('laboratory_id', $laboratory->id)->count();
        $lab_izlanuvchilar = Izlanuvchilar::where('laboratory_id', $laboratory->id)->count();
        return view('admin.labaratoriya.show', [
                    "laboratory" => $laboratory,
                    'lab_izlanuvchilar' => $lab_izlanuvchilar,
                    'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
                    'lab_xujalik' => $lab_xujalik,
                    'lab_xodimlar' => $lab_xodimlar,
                ]);
    }

   
    public function edit(Laboratory $laboratory)
    {
        return view("admin.labaratoriya.edit", ["laboratory"=> $laboratory]);
    }

    
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        $laboratory->update($request->toArray());

        return redirect('/laboratory')->with("status",'Ma\'lumotlar muvaffaqiyatli yangilandi.');

    }

    
    public function destroy(Laboratory $laboratory)
    {
        
        $laboratory->xodimlar()->update(['laboratory_id' => null]);
        $laboratory->ilmiyLoyihalar()->update(['laboratory_id' => null]);
        $laboratory->xujaliklar()->update(['laboratory_id' => null]);
        
        $laboratory->delete();
        
        return redirect()->back()->with("status",'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }
}
