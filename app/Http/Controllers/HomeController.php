<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Dalolatnoma;
use App\Models\Doktarantura;
use App\Models\Fakultetlar;
use App\Models\IlmiybnTaminlanga;
use App\Models\IlmiyLoyiha;
use App\Models\Ilmiymaqolalar;
use App\Models\Ilmiytezislar;
use App\Models\Intellektualmulk;
use App\Models\IqtisodiyMoliyaviy;
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
use Illuminate\Support\Facades\DB;
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



        $xodimlar = $tashkilot->xodimlar->count();
        $loyiha_count = $tashkilot->ilmiyloyhalar->count();

        $users = User::where('tashkilot_id', $tashRId)->with('roles')->get();

        $Ilmiy_faoliyat = $users->filter(function ($user) {
            return $user->roles->contains('name', 'Ilmiy_faoliyat_uchun_masul');
        });
        $Tashkilot_pasporti = $users->filter(function ($user) {
            return $user->roles->contains('name', 'Tashkilot_pasporti_uchun_masul');
        });
        $Xodimlar_uchun = $users->filter(function ($user) {
            return $user->roles->contains('name', 'Xodimlar_uchun_masul');
        });

        $lab_xodimlar = Xodimlar::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_xujalik = Xujalik::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_ilmiyLoyiha = IlmiyLoyiha::where('laboratory_id', auth()->user()->laboratory_id)->count();
        // ITM uchun
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with(['xodimlar', 'ilmiyloyhalar', 'xujaliklar', 'ilmiydarajalar'])->get();
        $itm_tash_itm = $tashkilots->count();

        $itm_adminlar = Tashkilot::where('tashkilot_turi', 'itm')->with('roles')->count();

        $tashkilot_turilar = [];

        $tashkilot_turilar[] = $tashkilot->where('tashkilot_turi', 'otm')->count();
        $tashkilot_turilar[] = $tashkilot->where('tashkilot_turi', 'itm')->count();
        $tashkilot_turilar[] = $tashkilot->where('tashkilot_turi', 'boshqa')->count();

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

        $masullar = $users->filter(function ($user) {
            return $user->roles->contains('name', 'labaratoriyaga_masul');
        })->count();

        $ilmiy_loyhalar_rahbariga = IlmiyLoyiha::where('user_id', auth()->id())->count();
        $labaratoriyalar = Laboratory::count();
        $laboratory = auth()->user()->laboratory_id;

        $izlanuvchilar = Doktarantura::count();
        $labaratoriyalar_admin = Laboratory::where("tashkilot_id", auth()->user()->tashkilot_id)->count();
        $izlanuvchilar_admin = Doktarantura::where("tashkilot_id", auth()->user()->tashkilot_id)->count();


        $kaf_IlmiyLoyiha = IlmiyLoyiha::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Xujalik = Xujalik::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Xodimlar = Xodimlar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Ilmiymaqolalar = Ilmiymaqolalar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Ilmiytezislar = Ilmiytezislar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Dalolatnoma = Dalolatnoma::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Monografiyalar = Monografiyalar::where('kafedralar_id', auth()->user()->kafedralar_id)->count();
        $kaf_Intellektualmulk = Intellektualmulk::where('kafedralar_id', auth()->user()->kafedralar_id)->count();


        $IlAu_chart = [];
        $asboblar_count = Asbobuskuna::count();
        $IlAu_chart[] = $asboblar_count;
        $IlAu_chart[] = $xujalik_count;

        $FKL_chart = [];
        $fakultets = Fakultetlar::count();
        $kafedras = Kafedralar::count();

        $FKL_chart[] = $fakultets;
        $FKL_chart[] = $kafedras;
        $FKL_chart[] = $labaratoriyalar;
        // ["Ilmiy maqolalar", "Ilmiy tezislar", " Intellektual mulk ", "Dalolatnomalar ", "Monografiyalar "]

        $ilmiy_maqol_chart = [];
        $ilmiymaqolalars = Ilmiymaqolalar::count();
        $ilmiytezislars = Ilmiytezislar::count();
        $intellektualmulks = Intellektualmulk::count();
        $dalolatnomas = Dalolatnoma::count();
        $monografiyalars = Monografiyalar::count();

        $ilmiy_maqol_chart[] = $ilmiymaqolalars;
        $ilmiy_maqol_chart[] = $ilmiytezislars;
        $ilmiy_maqol_chart[] = $intellektualmulks;
        $ilmiy_maqol_chart[] = $dalolatnomas;
        $ilmiy_maqol_chart[] = $monografiyalars;

        $ilmiy_loyihalar = [];
        $yak_ilmiyloyiha = IlmiyLoyiha::where('status', 'Yakunlangan')->count();
        $jar_ilmiyloyiha = IlmiyLoyiha::where('status', 'Jarayonda')->count();

        $ilmiy_loyihalar[] = $yak_ilmiyloyiha;
        $ilmiy_loyihalar[] = $jar_ilmiyloyiha;

        $labels = [];
        $values = [];

        $regions = Region::get();

        foreach ($regions as $region) {
            $count = $region->tashkilots()
                ->withCount([
                    'ilmiyloyhalar' => function ($q) {
                        // $q->where('is_active', 1);
                    }
                ])
                ->get()
                ->sum('ilmiyloyhalar_count');

            $labels[] = $region->name;
            $values[] = $count;
        }

        $statistika = DB::table('ilmiy_loyihas')
            ->selectRaw('YEAR(bosh_sana) as yil, COUNT(*) as loyiha_soni')
            ->groupBy(DB::raw('YEAR(bosh_sana)'))
            ->orderBy('yil', 'asc')
            ->get();

        $labels_yil = $statistika->pluck('yil');
        $data_yil = $statistika->pluck('loyiha_soni');


        $statistika_s = DB::table('stajirovkas')
            ->selectRaw('yil as sana, COUNT(*) as stajiovka_soni')
            ->groupBy('yil')
            ->orderBy('yil', 'asc')
            ->get();

        $stajiovka_labels_yil = $statistika_s->pluck('sana');
        $stajiovka_data_yil = $statistika_s->pluck('stajiovka_soni');

        return view('admin.home', [
            'tash_count' => $tash_count,
            'xodim_count' => $xodim_count,
            'xujalik_count' => $xujalik_count,
            'ilmiy_loyhalar_rahbariga' => $ilmiy_loyhalar_rahbariga,
            'izlanuvchilar' => $izlanuvchilar,
            'tashkiot_haqida' => $tashkilot,

            'Ilmiy_faoliyat' => $Ilmiy_faoliyat,
            'Tashkilot_pasporti' => $Tashkilot_pasporti,
            'Xodimlar_uchun' => $Xodimlar_uchun,
            'xodimlar' => $xodimlar,
            'loyiha_count' => $loyiha_count,
            'loyiha_bilan_t' => $loyiha_bilan_t,
            'itm_tash_itm' => $itm_tash_itm,
            'ilmiyloyihas_count_itm' => $ilmiyloyihas_count_itm,
            'xujalik_count_itm' => $xujalik_count_itm,
            'loyiha_bilan__itm' => $loyiha_bilan__itm,
            'xodim_count_itm' => $xodim_count_itm,
            'itm_adminlar' => $itm_adminlar,
            'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
            'lab_xujalik' => $lab_xujalik,
            'lab_xodimlar' => $lab_xodimlar,
            'labaratoriyalar' => $labaratoriyalar,
            'labaratoriyalar_admin' => $labaratoriyalar_admin,
            'izlanuvchilar_admin' => $izlanuvchilar_admin,
            'masullar' => $masullar,
            "laboratory" => $laboratory,

            'kaf_IlmiyLoyiha' => $kaf_IlmiyLoyiha,
            'kaf_Xujalik' => $kaf_Xujalik,
            'kaf_Xodimlar' => $kaf_Xodimlar,
            'kaf_Ilmiymaqolalar' => $kaf_Ilmiymaqolalar,
            'kaf_Ilmiytezislar' => $kaf_Ilmiytezislar,
            'kaf_Dalolatnoma' => $kaf_Dalolatnoma,
            'kaf_Monografiyalar' => $kaf_Monografiyalar,
            'kaf_Intellektualmulk' => $kaf_Intellektualmulk,

            'ilmiy_loyihalar' => $ilmiy_loyihalar,
            'FKL_chart' => $FKL_chart,
            'ilmiy_maqol_chart' => $ilmiy_maqol_chart,
            'IlAu_chart' => $IlAu_chart,
            'hududlar' => $labels,
            'viloy_ilmiyconut' => $values,
            'labels_yil' => $labels_yil,
            'data_yil' => $data_yil,
            "stajiovka_labels_yil" => $stajiovka_labels_yil,
            "stajiovka_data_yil" => $stajiovka_data_yil,
            'tashkilot_turilar' => $tashkilot_turilar

        ]);
    }

    public function monitoring()
    {
        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=", auth()->user()->region_id)->get();
            foreach ($regions as $region) {
                $doktarantura = $region->tashkilots()
                    ->where('status', 1)
                    ->count();
            }
            $region_id = Region::where('id', auth()->user()->region_id)->first();
            $id = $region_id->tashkilots()->pluck('id');
            $doktarantura = Doktarantura::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
            $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
            $stajirovka_expert = Stajirovkaexpert::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
            $asboblar_count = Asbobuskuna::whereIn('tashkilot_id', $id)->where('is_active', 1)->count();
            $asboblar_expert = Asbobuskunaexpert::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
            $doktarantura_expert = Doktarantura::whereIn('tashkilot_id', $id)->where('quarter', 2)->where('status', 1)->count();
            $loy_count = IlmiyLoyiha::whereIn('tashkilot_id', $id)->where('is_active', 1)->count();
            $loy_expert = Tekshirivchilar::whereIn('tashkilot_id', $id)->where('is_active', 1)->where('quarter', 2)->count();
        } else {
            $doktarantura = Doktarantura::where('quarter', 2)->count();
            $stajirovka_count = Stajirovka::where('quarter', 2)->count();
            $stajirovka_expert = Stajirovkaexpert::where('quarter', 2)->count();
            $asboblar_count = Asbobuskuna::where('is_active', 1)->count();
            $asboblar_expert = Asbobuskunaexpert::where('quarter', 2)->count();
            $doktarantura_expert = Doktarantura::where('quarter', 2)->where('status', 1)->count();
            $loy_count = IlmiyLoyiha::where('is_active', 1)->count();
            $loy_expert = Tekshirivchilar::where('quarter', 2)->where('is_active', 1)->count();
        }

        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=", auth()->user()->region_id)->get();
        } else {
            $regions = Region::orderBy('order')->get();
        }
        $tashkilotlar = Tashkilot::withCount([
            'ilmiyloyhalar as ilmiyloyha_count' => fn($q) => $q->where('is_active', 1),
            'stajirovkalar as stajirovka_count' => fn($q) => $q->where('quarter', 2),
            'asbobuskunalar as asbob_count' => fn($q) => $q->where('is_active', 1),
            'doktaranturalar as dok_count' => fn($q) => $q->where('quarter', 2),
        ])
            ->where('status', 1)
            ->paginate(20);

        $tashkilotlarQuery = Tashkilot::with([
            'ilmiyloyhalar' => fn($q) => $q->where('is_active', 1),
            'asbobuskunalar' => fn($q) => $q->where('is_active', 1),
            'stajirovkalar',
            'doktaranturalar'
        ])->get();

        // Guruhlash
        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'ilmiyloyhalar' => $group->sum(fn($t) => $t->ilmiyloyhalar->count()),
                'stajirovkalar' => $group->sum(fn($t) => $t->stajirovkalar->count()),
                'asbobuskunalar' => $group->sum(fn($t) => $t->asbobuskunalar->count()),
                'doktarantura' => $group->sum(fn($t) => $t->doktaranturalar->count()),
            ];
        }



        return view("admin.monitoring", [
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

