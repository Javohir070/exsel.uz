<?php

namespace App\Http\Controllers;

use App\Models\Intellektual;
use App\Http\Requests\StoreIntellektualRequest;
use App\Http\Requests\UpdateIntellektualRequest;

class IntellektualController extends Controller
{

    public function index()
    {
        $intellektuals = Intellektual::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(20);

        return view('admin.intellektual.index', compact('intellektuals'));
    }


    public function create()
    {
        return view('admin.intellektual.create');
    }


    public function store(StoreIntellektualRequest $request)
    {
        Intellektual::create([
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'user_id' => auth()->id(),
            'ilmiy_loyiha_id' => $request->ilmiy_loyiha_id,
            'mal_jur_reja' => $request->mal_jur_reja,
            'mal_jur_amalda' => $request->mal_jur_amalda,
            'xor_jur_reja' => $request->xor_jur_reja,
            'xor_jur_amalda' => $request->xor_jur_amalda,
            'web_jur_reja' => $request->web_jur_reja,
            'web_jur_amalda' => $request->web_jur_amalda,
            'tezislar_reja' => $request->tezislar_reja,
            'tezislar_amalda' => $request->tezislar_amalda,
            'ilmiy_mon_reja' => $request->ilmiy_mon_reja,
            'ilmiy_mon_amalda' => $request->ilmiy_mon_amalda,
            'darslik_reja' => $request->darslik_reja,
            'darslik_amalda' => $request->darslik_amalda,
            'b_bitiruv_mreja' => $request->b_bitiruv_mreja,
            'b_bitiruv_mamalda' => $request->b_bitiruv_mamalda,
            'm_bitiruv_dreja' => $request->m_bitiruv_dreja,
            'm_bitiruv_damalda' => $request->m_bitiruv_damalda,
            'p_bitiruv_dreja' => $request->p_bitiruv_dreja,
            'p_bitiruv_damalda' => $request->p_bitiruv_damalda,
            'i_mulk_areja' => $request->i_mulk_areja,
            'i_mulk_aamalda' => $request->i_mulk_aamalda,
            'ixtiro_olingan_psreja' => $request->ixtiro_olingan_psreja,
            'ixtiro_olingan_psamalda' => $request->ixtiro_olingan_psamalda,
            'ixtiro_ber_psreja' => $request->ixtiro_ber_psreja,
            'ixtiro_ber_psamalda' => $request->ixtiro_ber_psamalda,
            'dasturiy_gsreja' => $request->dasturiy_gsreja,
            'dasturiy_gsamalda' => $request->dasturiy_gsamalda,
            'nashr_uquv_reja' => $request->nashr_uquv_reja,
            'nashr_uquv_amalda' => $request->nashr_uquv_amalda,
        ]);

        return redirect()->route('intellektual.index')->with('status', 'Intellektual ma`lumotlar saqlandi');
    }


    public function show(Intellektual $intellektual)
    {
        return view('admin.intellektual.show', compact('intellektual'));
    }


    public function edit(Intellektual $intellektual)
    {
        return view('admin.intellektual.edit', compact('intellektual'));
    }


    public function update(UpdateIntellektualRequest $request, Intellektual $intellektual)
    {
        $intellektual->update([
            'mal_jur_reja' => $request->mal_jur_reja,
            'mal_jur_amalda' => $request->mal_jur_amalda,
            'xor_jur_reja' => $request->xor_jur_reja,
            'xor_jur_amalda' => $request->xor_jur_amalda,
            'web_jur_reja' => $request->web_jur_reja,
            'web_jur_amalda' => $request->web_jur_amalda,
            'tezislar_reja' => $request->tezislar_reja,
            'tezislar_amalda' => $request->tezislar_amalda,
            'ilmiy_mon_reja' => $request->ilmiy_mon_reja,
            'ilmiy_mon_amalda' => $request->ilmiy_mon_amalda,
            'darslik_reja' => $request->darslik_reja,
            'darslik_amalda' => $request->darslik_amalda,
            'b_bitiruv_mreja' => $request->b_bitiruv_mreja,
            'b_bitiruv_mamalda' => $request->b_bitiruv_mamalda,
            'm_bitiruv_dreja' => $request->m_bitiruv_dreja,
            'm_bitiruv_damalda' => $request->m_bitiruv_damalda,
            'p_bitiruv_dreja' => $request->p_bitiruv_dreja,
            'p_bitiruv_damalda' => $request->p_bitiruv_damalda,
            'i_mulk_areja' => $request->i_mulk_areja,
            'i_mulk_aamalda' => $request->i_mulk_aamalda,
            'ixtiro_olingan_psreja' => $request->ixtiro_olingan_psreja,
            'ixtiro_olingan_psamalda' => $request->ixtiro_olingan_psamalda,
            'ixtiro_ber_psreja' => $request->ixtiro_ber_psreja,
            'ixtiro_ber_psamalda' => $request->ixtiro_ber_psamalda,
            'dasturiy_gsreja' => $request->dasturiy_gsreja,
            'dasturiy_gsamalda' => $request->dasturiy_gsamalda,
            'nashr_uquv_reja' => $request->nashr_uquv_reja,
            'nashr_uquv_amalda' => $request->nashr_uquv_amalda,
        ]);

        return redirect()->route('intellektual.index')->with('status', 'Intellektual ma`lumotlar saqlandi');
    }


    public function destroy(Intellektual $intellektual)
    {
        $intellektual->delete();

        return redirect()->route('intellektual.index')->with('status', 'Intellektual ma`lumotlar o`chirildi');
    }
}
