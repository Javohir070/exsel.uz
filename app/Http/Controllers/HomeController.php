<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Dalolatnoma;
use App\Models\Doktarantura;
use App\Models\Doktaranturaexpert;
use App\Models\Fakultetlar;
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
        $izlanuvchilar = Doktarantura::count();
        $labaratoriyalar_admin = Laboratory::where("tashkilot_id",auth()->user()->tashkilot_id)->count();
        $izlanuvchilar_admin = Doktarantura::where("tashkilot_id",auth()->user()->tashkilot_id)->count();
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

        $fakultets = Fakultetlar::count();
        $kafedras = Kafedralar::count();

        return view('admin.home', [
            'fakultets' => $fakultets,
            'kafedras' => $kafedras,
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
        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=",auth()->user()->region_id)->get();
            foreach ($regions as $region) {
                $doktarantura = $region->tashkilots()
                    ->where('status', 1)
                    ->count();
            }
            $region_id = Region::where('id', auth()->user()->region_id)->first();
            $id = $region_id->tashkilots()->pluck('id');
            $doktarantura = Doktarantura::whereIn('tashkilot_id', $id)->count();
            $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $id)->count();
            $stajirovka_expert = Stajirovkaexpert::whereIn('tashkilot_id', $id)->count();
            $asboblar_count = Asbobuskuna::whereIn('tashkilot_id', $id)->where('is_active',1)->count();
            $asboblar_expert = Asbobuskunaexpert::whereIn('tashkilot_id', $id)->count();
            $doktarantura_expert = Doktarantura::whereIn('tashkilot_id', $id)->where('status',1)->count();
            $loy_count = IlmiyLoyiha::whereIn('tashkilot_id', $id)->where('is_active',1)->count();
            $loy_expert = Tekshirivchilar::whereIn('tashkilot_id', $id)->where('is_active',1)->count();
        }else{
            $doktarantura = Doktarantura::count();
            $stajirovka_count = Stajirovka::count();
            $stajirovka_expert = Stajirovkaexpert::count();
            $asboblar_count = Asbobuskuna::where('is_active',1)->count();
            $asboblar_expert = Asbobuskunaexpert::count();
            $doktarantura_expert = Doktarantura::where('status',1)->count();
            $loy_count = IlmiyLoyiha::where('is_active',1)->count();
            $loy_expert = Tekshirivchilar::where('is_active',1)->count();
        }

        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=",auth()->user()->region_id)->get();
        } else {
            $regions = Region::orderBy('order')->get();
        }
        $tashkilotlar = Tashkilot::where('status', 1)->paginate(25);

        $tashkilotlarQuery = Tashkilot::with(['ilmiyloyhalar', 'asbobuskunalar', 'stajirovkalar'])
            ->get();

        // Turga qarab guruhlash
        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'ilmiyloyhalar' => $group->pluck('ilmiyloyhalar')->flatten()->where('is_active', 1)->count(),
                'stajirovkalar' => $group->pluck('stajirovkalar')->flatten()->count(),
                'asbobuskunalar' => $group->pluck('asbobuskunalar')->flatten()->where('is_active', 1)->count(),
                'doktarantura' => $group->pluck('doktaranturalar')->flatten()->count(),
            ];
        }

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
            'tashkilotlarQuery' => $tashkilotlarQuery,
            'results' => $results,
        ]);



    }

}

