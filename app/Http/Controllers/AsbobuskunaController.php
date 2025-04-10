<?php

namespace App\Http\Controllers;

use App\Exports\AsbobuskunaExport;
use App\Imports\AsbobuskunaImport;
use App\Models\Asbobuskuna;
use App\Http\Requests\StoreAsbobuskunaRequest;
use App\Http\Requests\UpdateAsbobuskunaRequest;
use App\Models\Asbobuskunaexpert;
use App\Models\Asbobuskunafile;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Region;
use App\Models\Tashkilot;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        // $asbobuskunas = Asbobuskuna::paginate(20);
        $tashkilots = Tashkilot::where('asbobuskuna_is', 1)->count();
        $tash_count = Tashkilot::orderBy('name')->where('asbobuskuna_is', 1)->count();
        
        $asboblar_count = Asbobuskuna::where('is_active',1)->count();
        $asboblar_expert = Asbobuskunaexpert::count();
        $regions = Region::orderBy('order')->get();
        $asbobuskunas = Asbobuskuna::where('is_active', 1)->count();
        // $asbobuskuna =
        // dd($asbobuskunas);
        return view('admin.asbobuskuna.viloyat', ['asbobuskunas' => $asbobuskunas, 'asboblar_count' => $asboblar_count, 'regions' => $regions, 'asboblar_expert'=>$asboblar_expert, 'tashkilots'=>$tashkilots]);
    }

    public function tashkilot_turi_asbobuskuna($id)
    {
        // dd($id);

        $tashkilotlarQuery = Tashkilot::where('asbobuskuna_is',1)->where('region_id', '=', $id)->with(['asbobuskunalar'])
            ->get();

        // Turga qarab guruhlash
        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi','boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'asbobuskunalar' => $group->pluck('asbobuskunalar')->flatten()->where('is_active', 1)->count(),
            ];
        }
        $regions = Region::findOrFail( $id );

        return view('admin.asbobuskuna.tashkilot_turi',['results' => $results, 'regions'=>$regions]);
    }

    public function search_asbobuskunalar(Request $request)
    {
        $querysearch = $request->input('query');
        $id = $request->input('id');
        $type = $request->input('type');
        if (ctype_digit($id)) {
            $tashkilotlar = Tashkilot::orderBy('name')->where('asbobuskuna_is', 1)
                                ->where('region_id', '=', $id)
                                ->where('tashkilot_turi', '=', $type)
                                ->paginate(50);
            $tashkilotlars = Tashkilot::orderBy('name')->where('asbobuskuna_is', 1)
                                ->where('region_id', '=', $id)
                                ->where('tashkilot_turi', '=', $type)
                                ->get();
            $tash_count = $tashkilotlar->total();
           } else {
            $tashkilotlar = Tashkilot::orderBy('name')
                                    ->where('asbobuskuna_is', 1)
                                    ->where('name', 'like', '%' . $querysearch . '%')
                                    ->paginate(50);
            $tash_count = $tashkilotlar->total();
        }
        
        $id = $tashkilotlars->pluck('id');
        
        $asbobuskunas = Asbobuskuna::where('is_active', 1)->whereIn('tashkilot_id', $id)->count();
        $regions = Region::orderBy('order')->get();

        return view('admin.asbobuskuna.tashkilotlar', ['asbobuskunas' => $asbobuskunas, 'tashkilotlar' => $tashkilotlar, 'regions'=>$regions, 'tash_count'=>$tash_count]);
    }

    public function asbobu($id)
    {
        $tashkilot = Tashkilot::findOrFail($id);
        $asbobuskunas = Asbobuskuna::where('is_active', 1)->where('tashkilot_id', '=',$id)->paginate(20);
        return view('admin.asbobuskuna.asbobuskunalar', ['asbobuskunas' => $asbobuskunas, 'tashkilot' => $tashkilot]);
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
            'ilmiy_tadqiqot_ishilari' => $request->ilmiy_tadqiqot_ishilari,
            'ilmiy_tadqiqot_hajmi' => $request->ilmiy_tadqiqot_hajmi,
            'lab_zaxirasi' => $request->lab_zaxirasi,
            'foy_uchun_ariz' => $request->foy_uchun_ariz,
            'asbob_usk_ehtiyoji' => $request->asbob_usk_ehtiyoji,
            'zarur_ehtiyoji' => $request->zarur_ehtiyoji,
        ]);
        return redirect()->route('asbobuskuna.index')->with('status', 'Asbob uskunasi qo`shildi');
    }


    public function show(Asbobuskuna $asbobuskuna)
    {
        $asbobuskunaexpert = Asbobuskunaexpert::where('asbobuskuna_id', $asbobuskuna->id)->get();
        return view('admin.asbobuskuna.show', ['asbobuskuna' => $asbobuskuna, 'asbobuskunaexpert' => $asbobuskunaexpert]);
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
            'ilmiy_tadqiqot_ishilari' => $request->ilmiy_tadqiqot_ishilari,
            'ilmiy_tadqiqot_hajmi' => $request->ilmiy_tadqiqot_hajmi,
            'lab_zaxirasi' => $request->lab_zaxirasi,
            'foy_uchun_ariz' => $request->foy_uchun_ariz,
            'asbob_usk_ehtiyoji' => $request->asbob_usk_ehtiyoji,
            'zarur_ehtiyoji' => $request->zarur_ehtiyoji,
        ]);

        return redirect()->route('asbobuskuna.index')->with('status', 'Asbob uskunasi tahrirlandi');
    }


    public function destroy(Asbobuskuna $asbobuskuna)
    {
        $asbobuskuna->delete();
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }


    public function asbobuskuna_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new AsbobuskunaImport, $request->file('file'));

        return back()->with('status', 'Fayl muvaffaqiyatli yuklandi!');
    }

    public function export_asbobuskunalar()
    {
        return Excel::download(new AsbobuskunaExport, 'asbobuskunalar.xlsx');
    }
}
