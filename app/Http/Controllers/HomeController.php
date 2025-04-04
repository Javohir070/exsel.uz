<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Dalolatnoma;
use App\Models\Doktaranturaexpert;
use App\Models\IlmiybnTaminlanga;
use App\Models\IlmiyLoyiha;
use App\Models\Ilmiymaqolalar;
use App\Models\Ilmiytezislar;
use App\Models\Intellektualmulk;
use App\Models\IqtisodiyMoliyaviy;
use App\Models\Izlanuvchilar;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Monografiyalar;
use App\Models\Region;
use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\Tashkilot;
use App\Models\TashkilotRahbari;
use App\Models\Tekshirivchilar;
use App\Models\User;
use App\Models\Xodimlar;
use App\Models\Xujalik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }



    public function index()
    {
        $user = Auth::user();
        $tashRId = $user->tashkilot_id;
        // dd($tashRId);
        // Barcha kerakli ma'lumotlarni bitta so'rovda olish
        $tashkilot = Tashkilot::with([
            'xodimlar',
            'ilmiyloyhalar',
            'xujaliklar',
            'ilmiydarajalar'
        ])->find($tashRId);
        $tash_count = Tashkilot::count();
        $loy_count = IlmiyLoyiha::count();
        $xodim_count = Xodimlar::count();
        $xujalik_count = Xujalik::count();
        $loyiha_bilan_t = IlmiybnTaminlanga::count();
        $admins = User::count();
        $adminlar = User::role('admin')->count();

        $xodimlar = $tashkilot->xodimlar->count();
        $loyiha_count = $tashkilot->ilmiyloyhalar->count();

        $users = User::where('tashkilot_id', $tashRId)->with('roles')->get();

        $Ilmiy_faoliyat = $users->filter(function($user) {
            return $user->roles->contains('name', 'Ilmiy_faoliyat_uchun_masul');
        });
        $Tashkilot_pasporti = $users->filter(function($user) {
            return $user->roles->contains('name', 'Tashkilot_pasporti_uchun_masul');
        });
        $Xodimlar_uchun = $users->filter(function($user) {
            return $user->roles->contains('name', 'Xodimlar_uchun_masul');
        });

        $lab_xodimlar = Xodimlar::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_xujalik = Xujalik::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_ilmiyLoyiha = IlmiyLoyiha::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_izlanuvchilar = Izlanuvchilar::where('laboratory_id', auth()->user()->laboratory_id)->count();

        $iqtisodiy_moliyaviy = IqtisodiyMoliyaviy::where('tashkilot_id', $tashRId)->get();
        $tashkilot_raxbari = TashkilotRahbari::where('tashkilot_id', $tashRId)->get();

        // ITM uchun
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with(['xodimlar', 'ilmiyloyhalar', 'xujaliklar', 'ilmiydarajalar'])->get();
        $itm_tash_itm = $tashkilots->count();

        $itm_adminlar = Tashkilot::where('tashkilot_turi', 'itm')->with('roles')->count();


        $xodim_count_itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->xodimlar->count();
        });
        $ilmiyloyihas_count_itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->ilmiyloyhalar->count();
        });
        $xujalik_count_itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->xujaliklar->count();
        });
        $loyiha_bilan__itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->ilmiydarajalar->count();
        });
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function($user) {
            return $user->roles->contains('name', 'labaratoriyaga_masul');
        })->count();
        $ilmiy_loyhalar_rahbariga = IlmiyLoyiha::where('user_id', auth()->id())->count();
        $labaratoriyalar = Laboratory::count();
        $laboratory = auth()->user()->laboratory_id;
        $izlanuvchilar = Izlanuvchilar::where('is_active', 1)->count();
        $labaratoriyalar_admin = Laboratory::where("tashkilot_id",auth()->user()->tashkilot_id)->count();
        $izlanuvchilar_admin = Izlanuvchilar::where("tashkilot_id",auth()->user()->tashkilot_id)->where("is_active",1)->count();
        $phd = [
            "Tayanch doktorantura, PhD",
            "Mustaqil tadqiqotchi, PhD",
            "Maqsadli tayanch doktorantura, PhD"
        ];
        $dsc = [
            "Doktorantura, DSc",
            "Mustaqil tadqiqotchi, DSc",
            "Maqsadli doktorantura, DSc"
        ];
        $phd_soni = Izlanuvchilar::where("laboratory_id",auth()->user()->laboratory_id)->whereIn('talim_turi', $phd)->count();
        $dsc_soni = Izlanuvchilar::where("laboratory_id",auth()->user()->laboratory_id)->whereIn('talim_turi', $dsc)->count();

        $stajyor_soni = Izlanuvchilar::where("laboratory_id",auth()->user()->laboratory_id)->where('talim_turi', "Stajyor-tadqiqotchi")->count();

        $kaf_IlmiyLoyiha = IlmiyLoyiha::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Xujalik = Xujalik::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Xodimlar = Xodimlar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Ilmiymaqolalar = Ilmiymaqolalar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Ilmiytezislar = Ilmiytezislar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Dalolatnoma = Dalolatnoma::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Monografiyalar = Monografiyalar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Intellektualmulk = Intellektualmulk::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $tekshirivchilar = Tekshirivchilar::count();

        $stajirovka_count = Stajirovka::count();
        $asboblar_count = Asbobuskuna::count();


        $itm_count = Tashkilot::where('tashkilot_turi', 'itm')->count();


        return view('admin.home', [
            'tekshirivchilar' => $tekshirivchilar,
            'tashkiot_haqida' => $tashkilot,
            'tashkilot_raxbaris' => $tashkilot_raxbari,
            'iqtisodiy_moliyaviy' => $iqtisodiy_moliyaviy,
            'Ilmiy_faoliyat' => $Ilmiy_faoliyat,
            'Tashkilot_pasporti' => $Tashkilot_pasporti,
            'Xodimlar_uchun' => $Xodimlar_uchun,
            'xodimlar' => $xodimlar,
            'tash_count' => $tash_count,
            'loy_count' => $loy_count,
            'admins' => $admins,
            'loyiha_count' => $loyiha_count,
            'xodim_count' => $xodim_count,
            'xujalik_count' => $xujalik_count,
            'loyiha_bilan_t' => $loyiha_bilan_t,
            'adminlar' => $adminlar,
            'itm_tash_itm' => $itm_tash_itm,
            'ilmiyloyihas_count_itm' => $ilmiyloyihas_count_itm,
            'xujalik_count_itm' => $xujalik_count_itm,
            'loyiha_bilan__itm' => $loyiha_bilan__itm,
            'xodim_count_itm' => $xodim_count_itm,
            'itm_adminlar' => $itm_adminlar,
            'lab_izlanuvchilar' => $lab_izlanuvchilar,
            'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
            'lab_xujalik' => $lab_xujalik,
            'lab_xodimlar' => $lab_xodimlar,
            'labaratoriyalar' => $labaratoriyalar,
            'izlanuvchilar' => $izlanuvchilar,
            'labaratoriyalar_admin' => $labaratoriyalar_admin,
            'izlanuvchilar_admin' => $izlanuvchilar_admin,
            'masullar' => $masullar,
            "laboratory" => $laboratory,
            'phd_soni' => $phd_soni,
            'dsc_soni' => $dsc_soni,
            'stajyor_soni' => $stajyor_soni,
            'ilmiy_loyhalar_rahbariga' => $ilmiy_loyhalar_rahbariga,

            'kaf_IlmiyLoyiha' => $kaf_IlmiyLoyiha,
            'kaf_Xujalik' => $kaf_Xujalik,
            'kaf_Xodimlar' => $kaf_Xodimlar,
            'kaf_Ilmiymaqolalar' => $kaf_Ilmiymaqolalar,
            'kaf_Ilmiytezislar' => $kaf_Ilmiytezislar,
            'kaf_Dalolatnoma' => $kaf_Dalolatnoma,
            'kaf_Monografiyalar' => $kaf_Monografiyalar,
            'kaf_Intellektualmulk' => $kaf_Intellektualmulk,
            'stajirovka_count' => $stajirovka_count,
            'asboblar_count' => $asboblar_count,
            'itm_count' => $itm_count,

        ]);
    }

    public function monitoring()
    {
        $stajirovka_count = Stajirovka::count();
        $loy_count = IlmiyLoyiha::where('is_active',1)->count();
        $asboblar_count = Asbobuskuna::where('is_active',1)->count();
        $doktarantura = Tashkilot::where('doktarantura_is',1)->count();

        $stajirovka_expert = Stajirovkaexpert::count();
        $asboblar_expert = Asbobuskunaexpert::count();
        $doktarantura_expert = Doktaranturaexpert::count();
        $loy_expert = 0;

        $regions = Region::all();
        $tashkilotlar = Tashkilot::where('status', 1)->paginate(25);

        return view("admin.monitoring",[
            'loy_count' => $loy_count,
            'stajirovka_count' => $stajirovka_count,
            'asboblar_count' => $asboblar_count,
            'doktarantura' => $doktarantura,
            'stajirovka_expert' => $stajirovka_expert,
            'asboblar_expert' => $asboblar_expert,
            'loy_expert' => $loy_expert,
            'doktarantura_expert' => $doktarantura_expert,
            'regions' => $regions,
            'tashkilotlar' => $tashkilotlar,
        ]);



    }

}


UPDATE tashkilots
SET region_id = CASE
    WHEN id =528 THEN 13
    WHEN id =529 THEN 13
    WHEN id =530 THEN 13
    WHEN id =531 THEN 13
    WHEN id =532 THEN 13
    WHEN id =533 THEN 13
    WHEN id =534 THEN 13
    WHEN id =535 THEN 13
    WHEN id =536 THEN 13
    WHEN id =537 THEN 7

    WHEN id =538 THEN 13
    WHEN id =539 THEN 13


    WHEN id =408 THEN 13
    WHEN id =409 THEN 13
    WHEN id =412 THEN 8
    WHEN id =415 THEN 13
    WHEN id =417 THEN 13
    WHEN id =418 THEN 13
    WHEN id =419 THEN 13
    WHEN id =421 THEN 13

    WHEN id =422 THEN 13
    WHEN id =423 THEN 13
    WHEN id =424 THEN 4
    WHEN id =425 THEN 5
    WHEN id =426 THEN 1
    WHEN id =427 THEN 13
    WHEN id =429 THEN 5
    WHEN id =430 THEN 13
    WHEN id =431 THEN 6
    WHEN id =432 THEN 8

    WHEN id =433 THEN 1
    WHEN id =434 THEN 1
    WHEN id =435 THEN 11
    WHEN id =436 THEN 11
    WHEN id =438 THEN 13
    WHEN id =439 THEN 13
    WHEN id =440 THEN 13
    WHEN id =442 THEN 13
    WHEN id =443 THEN 13
    WHEN id =444 THEN 13

    WHEN id =445 THEN 13
    WHEN id =446 THEN 2
    WHEN id =447 THEN 11
    WHEN id =449 THEN 6
    WHEN id =450 THEN 13
    WHEN id =451 THEN 13
    WHEN id =452 THEN 13
    WHEN id =455 THEN 12
    WHEN id =456 THEN 11
    WHEN id =457 THEN 13

    WHEN id =458 THEN 13
    WHEN id =459 THEN 13
    WHEN id =460 THEN 13
    WHEN id =461 THEN 13
    WHEN id =462 THEN 13
    WHEN id =463 THEN 13
    WHEN id =464 THEN 13
    WHEN id =465 THEN 13
    WHEN id =466 THEN 13
    WHEN id =467 THEN 13

    WHEN id =468 THEN 11
    WHEN id =469 THEN 1
    WHEN id =470 THEN 13
    WHEN id =471 THEN 8
    WHEN id =472 THEN 12
    WHEN id =473 THEN 13
    WHEN id =474 THEN 13
    WHEN id =475 THEN 1
    WHEN id =476 THEN 13
    WHEN id =477 THEN 13

    WHEN id =478 THEN 13
    WHEN id =479 THEN 13
    WHEN id =480 THEN 13
    WHEN id =481 THEN 11
    WHEN id =482 THEN 11
    WHEN id =483 THEN 13
    WHEN id =484 THEN 13
    WHEN id =485 THEN 13
    WHEN id =486 THEN 1
    WHEN id =487 THEN 13

    WHEN id =488 THEN 13
    WHEN id =489 THEN 8
    WHEN id =490 THEN 1
    WHEN id =491 THEN 7
    WHEN id =492 THEN 13
    WHEN id =493 THEN 13
    WHEN id =494 THEN 13
    WHEN id =495 THEN 13
    WHEN id =496 THEN 11
    WHEN id =497 THEN 8

    WHEN id =498 THEN 13
    WHEN id =499 THEN 13
    WHEN id =500 THEN 13
    WHEN id =501 THEN 6
    WHEN id =502 THEN 13
    WHEN id =503 THEN 13
    WHEN id =504 THEN 13
    WHEN id =505 THEN 13
    WHEN id =506 THEN 13
    WHEN id =507 THEN 3

    WHEN id =508 THEN 13
    WHEN id =509 THEN 13
    WHEN id =510 THEN 13
    WHEN id =511 THEN 13
    WHEN id =512 THEN 2
    WHEN id =513 THEN 11
    WHEN id =514 THEN 11
    WHEN id =515 THEN 11
    WHEN id =516 THEN 13
    WHEN id =517 THEN 13

    WHEN id =518 THEN 2
    WHEN id =519 THEN 13
    WHEN id =520 THEN 13
    WHEN id =521 THEN 13
    WHEN id =522 THEN 13
    WHEN id =523 THEN 13
    WHEN id =524 THEN 13
    WHEN id =525 THEN 13
    WHEN id =526 THEN 13
    WHEN id =527 THEN 13

    ELSE region_id
END;
