<?php

namespace App\Exports;

use App\Models\Asbobuskunaexpert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsbobuskunaexpertMonitoringExpert implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Asbobuskunaexpert::with('tashkilot')->where('quarter', 2)->get()->map(function($asbobuskunaexpert){
            return [
                'id' => $asbobuskunaexpert->tashkilot->id,
                "Tashkilot nomi" => $asbobuskunaexpert->tashkilot->name,
                "Asbob-uskuna Nomi" => $asbobuskunaexpert->asbobuskuna->name,
                "Laboratoriya uskunalarini o'rnatilgan ilmiy bo'linma faoliyatiga mosligi." => $asbobuskunaexpert->lab_uskunalarini_mosligi,
                "Bajarilavotgan ilmiy-tadqiqot ishlari uchun zarurligi." => $asbobuskunaexpert->ilmiy_tadqiqot_ishilari,
                "Ilmiy-tadqiqot dasturlaridagi ish hajmi bilan bog'liqligi." => $asbobuskunaexpert->ilmiy_tadqiqot_hajmi,
                "Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasining mavjudligi." => $asbobuskunaexpert->akademik_soni,
                "Foydalanish uchun arizalarning ro'yxatga olinishi va foydalanish jadvalining yuritilishi holatiga baho berish." => $asbobuskunaexpert->foy_uchun_ariz,
                "Ilmiy tadqiqot va oliy ta'lim muassasalari laboratoriyalarining qo'shimcha asbob-uskunalar bo'yicha ehtiyoji"=>$asbobuskunaexpert->asbob_usk_ehtiyoji ,
                "Zarur sarflash materiallari va butlovchi qismlar bo'yicha ehtiyojar mavjudligi "=>$asbobuskunaexpert->zarur_ehtiyoji ,
                "Laboratoriya uskunalarining ishga yaroqliligi "=>$asbobuskunaexpert->lab_ishga_yaroqliligi ,
                
                "Ekspert xulosasi"=>$asbobuskunaexpert->status ,
                "Izoh"=>$asbobuskunaexpert->comment,
                "Ishchi guruh rahbari F.I.Sh"=>$asbobuskunaexpert->fish,
                "Ishchi guruh azosi F.I.Sh" => $asbobuskunaexpert->user->name,
                "Ekspert F.I.Sh"=>$asbobuskunaexpert->ekspert_fish,
                "Tashkilotning mas'ul rahbari  F.I.Sh"=>$asbobuskunaexpert->t_masul
            ];
        });
    }

    

    public function headings(): array
      {
          return [
                'id',
                "Tashkilot nomi",
                "Asbob-uskuna Nomi",
                "Laboratoriya uskunalarini o'rnatilgan ilmiy bo'linma faoliyatiga mosligi.",
                "Bajarilavotgan ilmiy-tadqiqot ishlari uchun zarurligi.",
                "Ilmiy-tadqiqot dasturlaridagi ish hajmi bilan bog'liqligi.",
                "Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasining mavjudligi.",
                "Foydalanish uchun arizalarning ro'yxatga olinishi va foydalanish jadvalining yuritilishi holatiga baho berish.",
                "Ilmiy tadqiqot va oliy ta'lim muassasalari laboratoriyalarining qo'shimcha asbob-uskunalar bo'yicha ehtiyoji",
                "Zarur sarflash materiallari va butlovchi qismlar bo'yicha ehtiyojar mavjudligi ",
                "Laboratoriya uskunalarining ishga yaroqliligi ",

                "Ekspert xulosasi",
                "Izoh",
                "Ishchi guruh rahbari F.I.Sh",
                "Ishchi guruh azosi F.I.Sh" ,
                "Ekspert F.I.Sh",
                "Tashkilotning mas'ul rahbari  F.I.Sh",
          ];
      }
}
