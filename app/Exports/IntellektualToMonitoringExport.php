<?php

namespace App\Exports;

use App\Models\Intellektual;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IntellektualToMonitoringExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Intellektual::with('tashkilot', 'ilmiyloyiha')->where('quarter', 2)->get()->map(function ($intellektual) {
            return [
                'id' => $intellektual->ilmiyloyiha->id,
                "Tashkilot nomi" => $intellektual->tashkilot->name,
                "Turi" => $intellektual->tashkilot->tashkilot_turi,
                "region_id" => $intellektual->tashkilot->region_id,
                'Loyiha mavzusi' => $intellektual->ilmiyloyiha->mavzusi,
                'Loyiha turi' => $intellektual->ilmiyloyiha->turi,
                'Loyiha shifri' => $intellektual->ilmiyloyiha->raqami,
                'Ijrochi tashkilot (OTM/ITM nomi)' => $intellektual->tashkilot->name,
                "Fan yo'nalishi" => $intellektual->ilmiyloyiha->pan_yunalish,
                'Loyiha rahbari ismi-sharifi' => $intellektual->ilmiyloyiha->rahbar_name,
                "Mahalliy ilmiy jurnallardagi maqolalar soni reja" => $intellektual->mal_jur_reja,
                "Mahalliy ilmiy jurnallardagi maqolalar soni amalda" => $intellektual->mal_jur_amalda,
                "Xorijiy jurnallardagi ilmiy maqolalar soni reja" => $intellektual->xor_jur_reja,
                "Xorijiy jurnallardagi ilmiy maqolalar soni amalda" => $intellektual->xor_jur_amalda,
                "Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni reja" => $intellektual->web_jur_reja,
                "Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni amalda" => $intellektual->web_jur_amalda,
                "Tezislar soni reja" => $intellektual->tezislar_reja,
                "Tezislar soni amalda" => $intellektual->tezislar_amalda,
                "Ilmiy monografiyalar soni reja" => $intellektual->ilmiy_mon_reja,
                "Ilmiy monografiyalar soni amalda" => $intellektual->ilmiy_mon_amalda,
                "Nashr qilingan oʻquv qoʻllanmalari soni reja" => $intellektual->nashr_uquv_reja,
                "Nashr qilingan oʻquv qoʻllanmalari soni amalda" => $intellektual->nashr_uquv_amalda,
                "Nashr qilingan darsliklar soni reja" => $intellektual->darslik_reja,
                "Nashr qilingan darsliklar soni amalda" => $intellektual->darslik_amalda,
                "Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni reja" => $intellektual->b_bitiruv_mreja,
                "Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni amalda" => $intellektual->b_bitiruv_mamalda,
                "Tayyorlangan magistrlik dissertatsiyalari soni reja" => $intellektual->m_bitiruv_dreja,
                "Tayyorlangan magistrlik dissertatsiyalari soni amalda" => $intellektual->m_bitiruv_damalda,
                "Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc) reja" => $intellektual->p_bitiruv_dreja,
                "Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc) amalda" => $intellektual->p_bitiruv_damalda,
                "Intellektual mulk obyektlari uchun berilgan arizalar soni reja" => $intellektual->i_mulk_areja,
                "Intellektual mulk obyektlari uchun berilgan arizalar soni amalda" => $intellektual->i_mulk_aamalda,
                "Ixtiro uchun olingan patentlari soni reja" => $intellektual->ixtiro_olingan_psreja,
                "Ixtiro uchun olingan patentlari soni amalda" => $intellektual->ixtiro_olingan_psamalda,
                "Ixtiro uchun patentga berilgan buyurtmalar soni reja" => $intellektual->ixtiro_ber_psreja,
                "Ixtiro uchun patentga berilgan buyurtmalar soni amalda" => $intellektual->ixtiro_ber_psamalda,
                "Dasturiy mahsulotga olingan guvohnomalar soni reja" => $intellektual->dasturiy_gsreja,
                "Dasturiy mahsulotga olingan guvohnomalar soni amalda" => $intellektual->dasturiy_gsamalda,

            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            "Tashkilot nomi",
            "Turi",
            "region_id",
            'Loyiha mavzusi',
            'Loyiha turi',
            'Loyiha shifri',
            'Ijrochi tashkilot (OTM/ITM nomi)',
            "Fan yo'nalishi",
            'Loyiha rahbari ismi-sharifi',
            "Mahalliy ilmiy jurnallardagi maqolalar soni reja",
            "Mahalliy ilmiy jurnallardagi maqolalar soni amalda",
            "Xorijiy jurnallardagi ilmiy maqolalar soni reja",
            "Xorijiy jurnallardagi ilmiy maqolalar soni amalda",
            "Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni reja",
            "Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni amalda",
            "Tezislar soni reja",
            "Tezislar soni amalda",
            "Ilmiy monografiyalar soni reja",
            "Ilmiy monografiyalar soni amalda",
            "Nashr qilingan oʻquv qoʻllanmalari soni reja",
            "Nashr qilingan oʻquv qoʻllanmalari soni amalda",
            "Nashr qilingan darsliklar soni reja",
            "Nashr qilingan darsliklar soni amalda",
            "Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni reja",
            "Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni amalda",
            "Tayyorlangan magistrlik dissertatsiyalari soni reja",
            "Tayyorlangan magistrlik dissertatsiyalari soni amalda",
            "Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc) reja",
            "Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc) amalda",
            "Intellektual mulk obyektlari uchun berilgan arizalar soni reja",
            "Intellektual mulk obyektlari uchun berilgan arizalar soni amalda",
            "Ixtiro uchun olingan patentlari soni reja",
            "Ixtiro uchun olingan patentlari soni amalda",
            "Ixtiro uchun patentga berilgan buyurtmalar soni reja",
            "Ixtiro uchun patentga berilgan buyurtmalar soni amalda",
            "Dasturiy mahsulotga olingan guvohnomalar soni reja",
            "Dasturiy mahsulotga olingan guvohnomalar soni amalda",
        ];
    }
}
