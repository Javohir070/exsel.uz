<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Http\Requests\StoreAsbobuskunaRequest;
use App\Http\Requests\UpdateAsbobuskunaRequest;
use App\Models\Asbobuskunafile;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\User;

class AsbobuskunaController extends Controller
{

    public function index()
    {
        $asbobuskunas = Asbobuskuna::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(20);
        $asbobuskunafile = Asbobuskunafile::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.asbobuskuna.index', ['asbobuskunas' => $asbobuskunas, 'asbobuskunafile' => $asbobuskunafile]);
    }

    public function asbobuskuna_masullar()
    {
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function($user) {
            return $user->roles->contains('name', 'Asbob_uskunalarga_masul');
        });


        return view("admin.asbobuskuna.masullar", ['masullar'=> $masullar]);
    }

    public function asbobuskunalar()
    {
        $asbobuskunas = Asbobuskuna::paginate(20);
        return view('admin.asbobuskuna.asbobuskunalar', ['asbobuskunas' => $asbobuskunas]);
    }


    public function create()
    {
        $ilmiy_loyhalar = IlmiyLoyiha::where('tashkilot_id', auth()->user()->tashkilot_id)->get();
        $laboratorys = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();
        $kafedralar = Kafedralar::where('tashkilot_id', auth()->user()->tashkilot_id)->get();
        return view('admin.asbobuskuna.create', [
                        'laboratorys' => $laboratorys,
                        'ilmiy_loyhalar' => $ilmiy_loyhalar,
                        'kafedralar' => $kafedralar
                    ]);
    }


    public function store(StoreAsbobuskunaRequest $request)
    {


        Asbobuskuna::create([
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'user_id' => auth()->user()->id,
            "name" => $request->name,
            "model" => $request->model,
            "turi" => $request->turi,
            "ishlab_davlat" => $request->ishlab_davlat,
            "ishlabchiq_yil" => $request->ishlabchiq_yil,
            "harid_summa" => $request->harid_summa,
            "buxgalteriya_summa" => $request->buxgalteriya_summa,
            "moliya_manbasi" => $request->moliya_manbasi,
            "loy_shifri" => $request->loy_shifri,
            "sh_raqami" => $request->sh_raqami,
            "sh_sanasi" => $request->sh_sanasi,
            "harid_qilingan_yil" => $request->harid_qilingan_yil,
            "holati" => $request->holati,
            "urnatilgan_yili" => $request->urnatilgan_yili,
            "laboratory_id" => $request->laboratory_id == 'yoq' ? null : $request->laboratory_id,
            "kafedralar_id" => $request->kafedralar_id == 'yoq' ? null : $request->kafedralar_id,
            "fish" => $request->fish,
            "jav_buy_raqami" => $request->jav_buy_raqami,
            "jav_sanasi" => $request->jav_sanasi,
        ]);
        return redirect()->route('asbobuskuna.index')->with('status', 'Asbob uskunasi qo`shildi');
    }


    public function show(Asbobuskuna $asbobuskuna)
    {
        return view('admin.asbobuskuna.show', ['asbobuskuna' => $asbobuskuna]);
    }


    public function edit(Asbobuskuna $asbobuskuna)
    {
        $ilmiy_loyhalar = IlmiyLoyiha::where('tashkilot_id', auth()->user()->tashkilot_id)->get();
        $laboratorys = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();
        $kafedralar = Kafedralar::where('tashkilot_id', auth()->user()->tashkilot_id)->get();
        return view('admin.asbobuskuna.edit', [
                        'asbobuskuna' => $asbobuskuna,
                        'laboratorys' => $laboratorys,
                        'ilmiy_loyhalar' => $ilmiy_loyhalar,
                        'kafedralar' => $kafedralar
                    ]);
    }


    public function update(StoreAsbobuskunaRequest $request, Asbobuskuna $asbobuskuna)
    {
        $asbobuskuna->update([
            "name" => $request->name,
            "model" => $request->model,
            "turi" => $request->turi,
            "ishlab_davlat" => $request->ishlab_davlat,
            "ishlabchiq_yil" => $request->ishlabchiq_yil,
            "harid_summa" => $request->harid_summa,
            "buxgalteriya_summa" => $request->buxgalteriya_summa,
            "moliya_manbasi" => $request->moliya_manbasi,
            "loy_shifri" => $request->loy_shifri,
            "sh_raqami" => $request->sh_raqami,
            "sh_sanasi" => $request->sh_sanasi,
            "harid_qilingan_yil" => $request->harid_qilingan_yil,
            "holati" => $request->holati,
            "urnatilgan_yili" => $request->urnatilgan_yili,
            "laboratory_id" => $request->laboratory_id == 'yoq' ? null : $request->laboratory_id,
            "kafedralar_id" => $request->kafedralar_id == 'yoq' ? null : $request->kafedralar_id,
            "fish" => $request->fish,
            "jav_buy_raqami" => $request->jav_buy_raqami,
            "jav_sanasi" => $request->jav_sanasi,
        ]);

        return redirect()->route('asbobuskuna.index')->with('status', 'Asbob uskunasi tahrirlandi');
    }


    public function destroy(Asbobuskuna $asbobuskuna)
    {
        $asbobuskuna->delete();
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }
}
