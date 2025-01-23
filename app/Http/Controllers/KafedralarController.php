<?php

namespace App\Http\Controllers;

use App\Models\Fakultetlar;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Http\Requests\StoreKafedralarRequest;
use App\Http\Requests\UpdateKafedralarRequest;
use App\Models\User;
use App\Models\Xodimlar;
use App\Models\Xujalik;
use Illuminate\Http\Request;

class KafedralarController extends Controller
{

    public function index()
    {
        $laboratorys = Kafedralar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.kafedralar.index", ["laboratorys"=> $laboratorys]);
    }


    public function kafedra()
    {
        $kafedra = Kafedralar::where("id",auth()->user()->kafedralar_id)->get();

        return view("admin.kafedralar.kafedra", ["kafedra"=> $kafedra]);
    }


    public function create()
    {
        $fakultetlar = Fakultetlar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        return view("admin.kafedralar.create", ["fakultetlar"=>$fakultetlar]);
    }


    public function responsible_masullar()
    {
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function($user) {
            return $user->roles->contains('name', 'kafedra_mudiri');
        });


        return view("admin.kafedralar.masullar", ['masullar'=> $masullar]);
    }

    public function Kafedralar_biriktirilgan_xodimlar()
    {
        $lab_xodimlar = Xodimlar::where("kafedralar_id",auth()->user()->kafedralar_id)->paginate(20);
        $tashkilot_xodimlar = Xodimlar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.kafedralar.labxodimlar", ["lab_xodimlar"=> $lab_xodimlar, 'tashkilot_xodimlar'=>$tashkilot_xodimlar]);
    }

    public function Kafedralar_biriktirilgan_ilmiyloyha()
    {
        $ilmiyloyiha = IlmiyLoyiha::where("kafedralar_id",auth()->user()->kafedralar_id)->paginate(20);
        $tashkilot_ilmiyloyiha = IlmiyLoyiha::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.kafedralar.labilmiyloyhi", ["ilmiyloyiha"=> $ilmiyloyiha, "tashkilot_ilmiyloyiha"=>$tashkilot_ilmiyloyiha]);
    }

    public function Kafedralar_biriktirilgan_xujalik()
    {
        $xujalik = Xujalik::where("kafedralar_id",auth()->user()->kafedralar_id)->paginate(20);
        $tashkilot_xujalik = Xujalik::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.kafedralar.labxujalik", ["xujalik"=> $xujalik, "tashkilot_xujalik"=> $tashkilot_xujalik]);
    }

    public function giveXodimToKaf(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $xodimlarId = $request->input('xodimlarId', []);

        // Foydalanuvchining kafedralar_id sini oling
        $kafedralarId = auth()->user()->kafedralar_id;

        // Tanlangan IDlarga tegishli xodimlarni yangilash
        if (!empty($xodimlarId)) {
            Xodimlar::whereIn('id', $xodimlarId)->update([
                'kafedralar_id' => $kafedralarId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xodimlar muvaffaqiyatli yangilandi!');

    }

    public function giveXujalikToKaf(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $xujaliklarId = $request->input('xujaliklarId', []);

        // Foydalanuvchining kafedralar_id sini oling
        $kafedralarId = auth()->user()->kafedralar_id;

        // Tanlangan IDlarga tegishli xujaliklarni yangilash
        if (!empty($xujaliklarId)) {
            Xujalik::whereIn('id', $xujaliklarId)->update([
                'kafedralar_id' => $kafedralarId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xujaliklar muvaffaqiyatli yangilandi!');

    }




    public function giveIlmiyLoyhaToKaf(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $ilmiyloyhalarId = $request->input('ilmiyloyhalarId', []);

        // Foydalanuvchining kafedralar_id sini oling
        $kafedralarId = auth()->user()->kafedralar_id;

        // Tanlangan IDlarga tegishli ilmiyloyhalarni yangilash
        if (!empty($ilmiyloyhalarId)) {
            IlmiyLoyiha::whereIn('id', $ilmiyloyhalarId)->update([
                'kafedralar_id' => $kafedralarId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'ilmiyloyhalar muvaffaqiyatli yangilandi!');

    }


    public function store(StoreKafedralarRequest $request)
    {
        Kafedralar::create([
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "name" => $request->name,
            'fakultetlar_id' => $request->fakultetlar_id,
            "tash_yil" => $request->tash_yil
        ]);

        return redirect('/kafedralar')->with("status",'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kafedralar $kafedralar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kafedralar $kafedralar)
    {
        $fakultetlar = Fakultetlar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        return view("admin.kafedralar.edit", ["kafedralar" => $kafedralar, "fakultetlar" => $fakultetlar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKafedralarRequest $request, Kafedralar $kafedralar)
    {
        $kafedralar->update([
            "name" => $request->name,
            'fakultetlar_id' => $request->fakultetlar_id,
            "tash_yil" => $request->tash_yil
        ]);

        return redirect('/kafedralar')->with("status",'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kafedralar $kafedralar)
    {
        $kafedralar->delete();

        return redirect()->back()->with("status",'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }
}
