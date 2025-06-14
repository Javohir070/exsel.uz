<?php

namespace App\Http\Controllers;

use App\Exports\IntellektualToMonitoringExport;
use App\Models\Intellektual;
use App\Http\Requests\StoreIntellektualRequest;
use App\Http\Requests\UpdateIntellektualRequest;
use Maatwebsite\Excel\Facades\Excel;

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

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
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
        if ($request->izohlar == 1) {
            $intellektual->update([
                "mal_jur_izoh" => $request->mal_jur_izoh,
                "xor_jur_izoh" => $request->xor_jur_izoh,
                "web_jur_izoh" => $request->web_jur_izoh,
                "tezislar_izoh" => $request->tezislar_izoh,
                "ilmiy_mon_izoh" => $request->ilmiy_mon_izoh,
                "nashr_uquv_izoh" => $request->nashr_uquv_izoh,
                "darslik_izoh" => $request->darslik_izoh,
                "b_bitiruv_izoh" => $request->b_bitiruv_izoh,
                "m_bitiruv_izoh" => $request->m_bitiruv_izoh,
                "p_bitiruv_izoh" => $request->p_bitiruv_izoh,
                "i_mulk_izoh" => $request->i_mulk_izoh,
                "ixtiro_olingan_izoh" => $request->ixtiro_olingan_izoh,
                "ixtiro_ber_izoh" => $request->ixtiro_ber_izoh,
                "dasturiy_izoh" => $request->dasturiy_izoh,
            ]);
        } else {
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
        }


        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }


    public function destroy(Intellektual $intellektual)
    {
        $intellektual->delete();

        return redirect()->route('intellektual.index')->with('status', 'Intellektual ma`lumotlar o`chirildi');
    }


    public function monitoring_exportintellektual()
    {
        $fileName = 'monitoring_intellektual_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new IntellektualToMonitoringExport, $fileName);
    }
}
