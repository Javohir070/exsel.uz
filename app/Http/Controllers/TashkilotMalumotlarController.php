<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\IlmiybnTaminlanga;
use App\Models\IlmiyLoyiha;
use App\Models\Stajirovka;
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

        $stajirovka_count = Stajirovka::where('tashkilot_id',$tashkilotmalumotlar)->count();
        $asboblar_count = Asbobuskuna::where('tashkilot_id',$tashkilotmalumotlar)->count();


        return view('admin.tashkilotmalumotlar.tashkilot',[
            'tashkilot' => $tashkilot,
            'id' => $tashkilotmalumotlar,
            'admins' => $admins,
            'loy_count' => $loy_count,
            'xodim_count' => $xodim_count,
            'xujalik_count' => $xujalik_count,
            'loyiha_bilan_t' => $loyiha_bilan_t,
            'stajirovka_count' => $stajirovka_count,
            'asboblar_count' => $asboblar_count,
        ]);
    }
}

UPDATE tashkilots
SET region_id = CASE
    WHEN id = 380 THEN 13
    WHEN id = 381 THEN 13
    WHEN id = 382 THEN 13
    WHEN id = 383 THEN 13
    WHEN id = 384 THEN 13
    WHEN id = 385 THEN 13
    WHEN id = 386 THEN 13
    WHEN id = 387 THEN 13
    WHEN id = 388 THEN 13
    WHEN id = 389 THEN 13
    WHEN id = 390 THEN 13
    WHEN id = 395 THEN 12
    WHEN id = 397 THEN 9
    WHEN id = 398 THEN 11
    WHEN id = 399 THEN 13
    WHEN id = 403 THEN 13
    WHEN id = 404 THEN 13
    WHEN id = 405 THEN 11
    WHEN id = 406 THEN 13
    WHEN id = 407 THEN 13
    WHEN id = 408 THEN 13
    WHEN id = 409 THEN 13
    WHEN id = 412 THEN 8

    WHEN id = 417 THEN 13
    WHEN id = 418 THEN 13
    WHEN id = 419 THEN 13
    WHEN id = 421 THEN 13
    WHEN id = 422 THEN 13
    WHEN id = 423 THEN 13
    WHEN id = 424 THEN 4
    WHEN id = 426 THEN 1
    WHEN id = 427 THEN 13
    WHEN id = 429 THEN 5
    WHEN id = 430 THEN 13
    WHEN id = 433 THEN 1
    WHEN id = 435 THEN 11

    WHEN id = 436 THEN 11
    WHEN id = 439 THEN 13
    ELSE region_id
END;
