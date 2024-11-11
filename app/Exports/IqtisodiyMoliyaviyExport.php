<?php

namespace App\Exports;

use App\Models\IqtisodiyMoliyaviy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IqtisodiyMoliyaviyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IqtisodiyMoliyaviy::with('tashkilot')->get()->map(function ($iqtisodiylar){
            return [
               "ID" => $iqtisodiylar->id,
               "Tashkilot" => $iqtisodiylar->tashkilot->name,
               "Tashkilot kadastr raqami" => $iqtisodiylar->kadastr_raqami,
               "Umumiy maydoni (ga)" => $iqtisodiylar->u_maydoni,
               "Shundan tajriba maydonlari (ga)" => $iqtisodiylar->taj_maydonlari,
               "Binolar soni" => $iqtisodiylar->binolar_soni,
               "Binolarning auditoriya sig‘imi" => $iqtisodiylar->auditoriya_sigimi,
               "Katta xajmdagi auditoriyalar soni (150-200 kishilik)" => $iqtisodiylar->k_xaj_auditor_soni,
               "Ustav fondi miqdori, mln so‘mda" => $iqtisodiylar->pondi_miqdori,
               "Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni" => $iqtisodiylar->ilmiyp_bulinalar,
               "Tabiy gaz mavjudligi" => $iqtisodiylar->gaz,
               "Elektr energiya mavjudligi" => $iqtisodiylar->elektr,
               "Suv mavjudligi" => $iqtisodiylar->suv,
               "Kanalizatsiya mavjudligi" => $iqtisodiylar->kanalizasiya,
               "Internet mavjudligi" => $iqtisodiylar->internet,
            ];
        });;
    }

    public function headings(): array
    {
        return [
            "ID",
            "Tashkilot",
            "Tashkilot kadastr raqami",
            "Umumiy maydoni (ga)",
            "Shundan tajriba maydonlari (ga)",
            "Binolar soni",
            "Binolarning auditoriya sig‘imi",
            "Katta xajmdagi auditoriyalar soni (150-200 kishilik)",
            "Ustav fondi miqdori, mln so‘mda",
            "Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni",
            "Tabiy gaz mavjudligi",
            "Elektr energiya mavjudligi",
            "Suv mavjudligi",
            "Kanalizatsiya mavjudligi",
            "Internet mavjudligi",
        ];
    }
}
