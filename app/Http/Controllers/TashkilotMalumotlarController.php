<?php

namespace App\Http\Controllers;

use App\Models\IlmiybnTaminlanga;
use App\Models\IlmiyLoyiha;
use App\Models\Tashkilot;
use App\Models\User;
use App\Models\Xodimlar;
use App\Models\Xujalik;
use Illuminate\Http\Request;

class TashkilotMalumotlarController extends Controller
{

    public function index()
    {
        $tashkilotlar = Tashkilot::withCount('xodimlar')->orderBy('xodimlar_count', 'desc')->paginate(25);

        return view("admin.tashkilotmalumotlar.xodimlarsoni",['tashkilotlar'=>$tashkilotlar]);
    }

    public function adminlar()
    {
        $adminlar = Tashkilot::withCount('user')->orderByDesc('user_count')->paginate(25);

        return view("admin.tashkilotmalumotlar.adminlarsoni",['adminlar'=>$adminlar]);
    }
    public function show($tashkilotmalumotlar)
    {
        $tashkilot = Tashkilot::where('id',$tashkilotmalumotlar)->get();
        $xodim_count = Xodimlar::where('tashkilot_id',$tashkilotmalumotlar)->count();
        $admins = User::where('tashkilot_id',$tashkilotmalumotlar)->count();
        $xujalik_count = Xujalik::where('tashkilot_id',$tashkilotmalumotlar)->count();
        $loyiha_bilan_t = IlmiybnTaminlanga::where('tashkilot_id',$tashkilotmalumotlar)->count();
        $loy_count = IlmiyLoyiha::where('tashkilot_id',$tashkilotmalumotlar)->count();

        return view('admin.tashkilotmalumotlar.tashkilot',[
            'tashkilot' => $tashkilot,
            'id' => $tashkilotmalumotlar,
            'admins' => $admins,
            'loy_count' => $loy_count,
            'xodim_count' => $xodim_count,
            'xujalik_count' => $xujalik_count,
            'loyiha_bilan_t' => $loyiha_bilan_t
        ]);
    }
}
