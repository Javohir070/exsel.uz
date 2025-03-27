<?php

namespace App\Http\Controllers;

use App\Imports\IlmiyLoyihaImport;
use App\Models\IlmiyLoyiha;
use App\Http\Requests\StoreIlmiyLoyihaRequest;
use App\Http\Requests\UpdateIlmiyLoyihaRequest;
use App\Models\Laboratory;
use App\Models\Tashkilot;
use App\Models\Tekshirivchilar;
use App\Models\Umumiyyil;
use Illuminate\Http\Request;
use App\Exports\IlmiyLoyihasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
class IlmiyLoyihaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $ilmiyloyiha = IlmiyLoyiha::where('tashkilot_id', $tashRId)->latest()->paginate(20);

        return view('admin.ilmiyloyiha.index', ['ilmiyloyiha' => $ilmiyloyiha]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.ilmiyloyiha.create', ['tashkilots' => $tashkilots, 'laboratorylar' => $laboratorylar]);
    }


    public function scientific_project()
    {
        $ilmiy_loyhalar = IlmiyLoyiha::where('user_id', auth()->id())->get();

        return view('admin.ilmiyloyiha.loyha_rahbari', ['ilmiy_loyhalar' => $ilmiy_loyhalar]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIlmiyLoyihaRequest $request)
    {
        $umumiyyil = Umumiyyil::create([
            "y2017" => $request->y2017 ?? 0,
            "y2018" => $request->y2018 ?? 0,
            "y2019" => $request->y2019 ?? 0,
            "y2020" => $request->y2020 ?? 0,
            "y2021" => $request->y2021 ?? 0,
            "y2022" => $request->y2022 ?? 0,
            "y2023" => $request->y2023 ?? 0,
            "y2024" => $request->y2024 ?? 0,
        ]);
        IlmiyLoyiha::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => $request->tashkilot_id ?? auth()->user()->tashkilot_id,
            "kafedralar_id" => auth()->user()->kafedralar_id,
            "umumiyyil_id" => $umumiyyil->id,
            "mavzusi" => $request->mavzusi,
            "turi" => $request->turi,
            "dastyri" => $request->dastyri ?? "yoq",
            "q_hamkor_tashkilot" => $request->q_hamkor_tashkilot ?? "yoq",
            "hamkor_davlat" => $request->hamkor_davlat ?? "yoq",
            "muddat" => $request->muddat ?? "yoq",
            "bosh_sana" => $request->bosh_sana,
            "tug_sana" => $request->tug_sana,
            "pan_yunalish" => $request->pan_yunalish,
            "rahbar_name" => $request->rahbar_name,
            "raqami" => $request->raqami,
            "sanasi" => $request->sanasi ?? "yoq",
            "sum" => $request->sum,
            "umumiy_mablag" => $request->sum ?? 'yoq',
            "olingan_natija" => $request->olingan_natija ?? "yoq",
            "joriy_holati" => $request->joriy_holati ?? "yoq",
            "tijoratlashtirish" => $request->tijoratlashtirish ?? "yoq",
            "moliyalashtirilganmi" => $request->moliyalashtirilganmi,
        ]);
        if (auth()->user()->hasRole('labaratoriyaga_masul')) {
            return redirect()->route('lab_ilmiyloyiha.index')->with('status', "Ma\'lumotlar muvaffaqiyatli qo'shildi.");
        } else if (auth()->user()->hasRole('kafedra_mudiri')) {
            return redirect("/kafedralar-ilmiyloyhi")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        } else {
            return redirect('/ilmiyloyiha')->with('status', 'Ma\'lumotlar muvaffaqiyatli qoshildi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(IlmiyLoyiha $ilmiyloyiha)
    {
        return view('admin.ilmiyloyiha.show', ['ilmiyloyiha' => $ilmiyloyiha]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IlmiyLoyiha $ilmiyloyiha)
    {
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.ilmiyloyiha.edit', ['ilmiyloyiha' => $ilmiyloyiha, 'tashkilots' => $tashkilots, 'laboratorylar' => $laboratorylar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIlmiyLoyihaRequest $request, IlmiyLoyiha $ilmiyloyiha)
    {
        if ($request->hasFile('malumotnoma')) {
            $name_malumotnoma = time() . $request->file('malumotnoma')->getClientOriginalName();
            $path_malumotnoma = $request->file('malumotnoma')->storeAs('IlmiyLoyiha-file', $name_malumotnoma);
        }
        if ($request->hasFile('savolnoma')) {
            $name_savolnoma = time() . $request->file('savolnoma')->getClientOriginalName();
            $path_savolnoma = $request->file('savolnoma')->storeAs('IlmiyLoyiha-file', $name_savolnoma);
        }

        if ($request->hasFile('file')) {
            $name_file = time() . $request->file('file')->getClientOriginalName();
            $path_file = $request->file('')->storeAs('IlmiyLoyiha-file', $name_file);
        }

        $umumiyyil = Umumiyyil::findOrFail($ilmiyloyiha->umumiyyil_id);
        $umumiyyil->update([
            "y2017" => $request->y2017 ?? 0,
            "y2018" => $request->y2018 ?? 0,
            "y2019" => $request->y2019 ?? 0,
            "y2020" => $request->y2020 ?? 0,
            "y2021" => $request->y2021 ?? 0,
            "y2022" => $request->y2022 ?? 0,
            "y2023" => $request->y2023 ?? 0,
            "y2024" => $request->y2024 ?? 0,
        ]);

        $ilmiyloyiha->update([
            "user_id" => auth()->id(),
            "tashkilot_id" => $request->tashkilot_id ?? auth()->user()->tashkilot_id,
            "kafedralar_id" => auth()->user()->kafedralar_id,
            "umumiyyil_id" => $umumiyyil->id,
            "mavzusi" => $request->mavzusi,
            "turi" => $request->turi ?? "yo'q",
            "dastyri" => $request->dastyri,
            "q_hamkor_tashkilot" => $request->q_hamkor_tashkilot ?? "yo'q",
            "hamkor_davlat" => $request->hamkor_davlat ?? "yo'q",
            "muddat" => $request->muddat,
            "bosh_sana" => $request->bosh_sana,
            "tug_sana" => $request->tug_sana,
            "pan_yunalish" => $request->pan_yunalish,
            "rahbar_name" => $request->rahbar_name,
            "raqami" => $request->raqami,
            "sanasi" => $request->sanasi,
            "sum" => $request->sum,
            "umumiy_mablag" => $request->sum,
            "olingan_natija" => $request->olingan_natija,
            "joriy_holati" => $request->joriy_holati,
            "tijoratlashtirish" => $request->tijoratlashtirish,


            "rahbariilmiy_darajasi" => $request->rahbariilmiy_darajasi,
            "rahbariilmiy_unvoni" => $request->rahbariilmiy_unvoni,
            "r_lavozimi" => $request->r_lavozimi,
            "hamrahbar_fish" => $request->hamrahbar_fish,
            "hamr_ishjoyi" => $request->hamr_ishjoyi,
            "hamr_lavozimi" => $request->hamr_lavozimi,
            "hamr_davlati" => $request->hamr_davlati,
            "joyyilajratilgan_mablag" => $request->joyyilajratilgan_mablag,
            "shtat_birligi" => $request->shtat_birligi,
            "ijrochilar_soni" => $request->ijrochilar_soni,
            "ortacha_yoshi" => $request->ortacha_yoshi,
            "moddiy_texnik_mablaglar" => $request->moddiy_texnik_mablaglar,
            "jami_summaga_nisbatan" => $request->jami_summaga_nisbatan,
            "jami_chop_joriyyil" => $request->jami_chop_joriyyil,
            "jami_chop_jami" => $request->jami_chop_jami,
            "mahalliymaqola_joriyyil" => $request->mahalliymaqola_joriyyil,
            "mahalliymaqol_jami" => $request->mahalliymaqol_jami,
            "xorijiymaqola_joriyyil" => $request->xorijiymaqola_joriyyil,
            "xorijiymaqola_jami" => $request->xorijiymaqola_jami,
            "scopus_joriyyil" => $request->scopus_joriyyil,
            "scopus_jami" => $request->scopus_jami,
            "tezislar_joriyyil" => $request->tezislar_joriyyil,
            "tezislar_jami" => $request->tezislar_jami,
            "ilmiy_mon_joriyyil" => $request->ilmiy_mon_joriyyil,
            "ilmiy_mon_jami" => $request->ilmiy_mon_jami,
            "olinganpatent_joriyyil" => $request->olinganpatent_joriyyil,
            "olinganpatent_jami" => $request->olinganpatent_jami,
            "patentga_berilgansoni" => $request->patentga_berilgansoni,
            "dasturiy_maxguv_joriyyil" => $request->dasturiy_maxguv_joriyyil,
            "dasturiy_maxguv_jami" => $request->dasturiy_maxguv_jami,
            "hisobot_davrida_natijalar" => $request->hisobot_davrida_natijalar,
            "loyiha_yakunida" => $request->loyiha_yakunida,
            "ilmiy_ishlanma" => $request->ilmiy_ishlanma,
            "mavzusi_ru" => $request->mavzusi_ru,
            "moliyalashtirilganmi" => $request->moliyalashtirilganmi,
            "ijrochi_tashkilot" => $request->ijrochi_tashkilot,
            "malumotnoma" => $path_malumotnoma,
            "savolnoma" => $path_savolnoma,
            "file" => $path_file,
        ]);
        if (auth()->user()->hasRole('labaratoriyaga_masul')) {
            return redirect()->route('lab_ilmiyloyiha.index')->with('status', "Ma\'lumotlar muvaffaqiyatli yangilandi.");
        } else if (auth()->user()->hasRole('kafedra_mudiri')) {
            return redirect("/kafedralar-ilmiyloyhi")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        } else {
            return redirect()->route("ilmiyloyiha.index")->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi');
        }


    }

    public function masul()
    {

        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function ($user) {
            return $user->roles->contains('name', 'Ilmiy_loyiha_rahbari');
        });


        return view("admin.ilmiyloyiha.masul", ['masullar' => $masullar]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IlmiyLoyiha $ilmiyloyiha)
    {
        $ilmiyloyiha->delete();
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');

    }

    public function ilmiyloyihalar()
    {
        $ilmiyloyihalar = IlmiyLoyiha::paginate(25);
        return view("admin.ilmiyloyiha.ilmiyloyihalar", ['ilmiyloyihalar' => $ilmiyloyihalar]);
    }
    public function exportilmiy()
    {
        $fileName = 'Ilmiyloyihalar' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new IlmiyLoyihasExport, $fileName);
    }

    public function searchloyiha(Request $request)
    {
        $querysearch = $request->input('query');
        $ilmiyloyiha = IlmiyLoyiha::where('mavzusi', 'like', '%' . $querysearch . '%')
            ->orWhere('turi', 'like', '%' . $querysearch . '%')
            ->orWhere('rahbar_name', 'like', '%' . $querysearch . '%')
            ->orWhere('raqami', 'like', '%' . $querysearch . '%')
            ->orWhere('status', 'like', '%' . $querysearch . '%')
            ->paginate(10);
        return view('admin.ilmiyloyiha.search_results', compact('ilmiyloyiha'));
    }



    public function IlmiyLoyiha_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new IlmiyLoyihaImport, $request->file('file'));

        return back()->with('success', 'Fayl muvaffaqiyatli yuklandi!');
    }
}
