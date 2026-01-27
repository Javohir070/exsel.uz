<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Doktarantura;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Stajirovka;
use App\Models\Tashkilot;
use App\Models\User;
use App\Models\Xodimlar;
use App\Models\Xujalik;

class TashkilotMalumotlarController extends Controller
{

    public function index()
    {
        $tashkilotlar = Tashkilot::withCount('xodimlar')->orderBy('xodimlar_count', 'desc')->paginate(25);

        return view("admin.tashkilotmalumotlar.xodimlarsoni", ['tashkilotlar' => $tashkilotlar]);
    }

    public function adminlar()
    {
        $adminlar = Tashkilot::withCount('user')->orderByDesc('user_count')->paginate(25);

        return view("admin.tashkilotmalumotlar.adminlarsoni", ['adminlar' => $adminlar]);
    }

    public function show($tashkilotmalumotlar)
    {
        $tashkilot = Tashkilot::where('id', $tashkilotmalumotlar)->get();
        $admins = User::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $ilmiyloyiha_count = IlmiyLoyiha::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $xodimlar_count = Xodimlar::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $xujalik_count = Xujalik::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $stajirovka_count = Stajirovka::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $asbobuskuna_count = Asbobuskuna::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $doktarantura_count = Doktarantura::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $laboratory_count = Laboratory::where('tashkilot_id', $tashkilotmalumotlar)->count();
        $kafedralar_count = Kafedralar::where('tashkilot_id', $tashkilotmalumotlar)->count();

        return view('admin.tashkilotmalumotlar.tashkilot', [
            'tashkilot' => $tashkilot,
            'id' => $tashkilotmalumotlar,
            'admins' => $admins,
            'ilmiyloyiha_count' => $ilmiyloyiha_count,
            'xodimlar_count' => $xodimlar_count,
            'xujalik_count' => $xujalik_count,
            'stajirovka_count' => $stajirovka_count,
            'asbobuskuna_count' => $asbobuskuna_count,
            'doktarantura_count' => $doktarantura_count,
            'laboratory_count' => $laboratory_count,
            'kafedralar_count' => $kafedralar_count,
        ]);
    }
}
