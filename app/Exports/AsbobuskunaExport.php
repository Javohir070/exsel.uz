<?php

namespace App\Exports;

use App\Models\Asbobuskuna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsbobuskunaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asbobuskuna::with('tashkilot')->get()->map(function ($asbobuskuna) {

            return [
                'id' => $asbobuskuna->id,
                'Tashkilot nomi' => $asbobuskuna->tashkilot->name,
                'Tashkilot turi' => $asbobuskuna->tashkilot->tashkilot_turi,
                "Nomi" => $asbobuskuna->name,
                "Model" => $asbobuskuna->model,
                "Turi" => $asbobuskuna->turi,
                "Ishlab chiqilgan davlat" => $asbobuskuna->ishlab_davlat,
                "Ishlab chiqilgan yili" => $asbobuskuna->ishlabchiq_yil,
                "Harid qilingan summasi (buxgalteriya balans summasi)" => $asbobuskuna->harid_summa,
                "Buxgalteriya bo'yicha qoldiq summasi" => $asbobuskuna->buxgalteriya_summa,
                "Moliyalashtirish manbasi" => $asbobuskuna->moliya_manbasi,
                "Loyiha shifri" => $asbobuskuna->loy_shifri,
                "Shartnoma raqami (uskuna bo'yicha)" => $asbobuskuna->sh_raqami,
                "Shartnoma sanasi" => $asbobuskuna->sh_sanasi,
                "Harid qilingan yili" => $asbobuskuna->harid_qilingan_yil,
                "Holati" => $asbobuskuna->holati,
                "O‘rnatilgan yili" => $asbobuskuna->urnatilgan_yili,
                "Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya) nomi" => $asbobuskuna->laboratory_id,
                "Foydalanishga mas'ul tarkibiy bo‘linma (kafedra) nomi" => $asbobuskuna->kafedralar_id,
                 "F.I.Sh" => $asbobuskuna->fish,
                 "Javobgar etib belgilanganligi to‘g‘risida buyruq raqami" => $asbobuskuna->jav_buy_raqami,
                 "Javobgar etib belgilanganligi to‘g‘risida buyruq sanasi" => $asbobuskuna->jav_buy_sanasi,
                 "Bajarilayotgan ilmiy-tadqiqot ishlari" => $asbobuskuna->ilmiy_tadqiqot_ishilari,
                 "Ilmiy-tadqiqot dasturlaridagi ish hajmi" => $asbobuskuna->ilmiy_tadqiqot_hajmi,
                 "Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasi" => $asbobuskuna->lab_zaxirasi,
                 "Foydalanish uchun arizalarning ro‘yxatga olinishi va foydalanish jadvalining yuritilishi" => $asbobuskuna->foy_uchun_ariz,
                 "Ilmiy tadqiqot va oliy ta’lim muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalarga ehtiyoji" => $asbobuskuna->asbob_usk_ehtiyoji,
                 "Zarur sarflash materiallari va butlovchi qismlar bo‘yicha ehtiyoji" => $asbobuskuna->zarur_ehtiyoji,
            ];
        });
    }


    public function headings(): array
    {
        return [
            'id',
            'Tashkilot nomi',
            'Tashkilot turi',
            "Nomi",
            "Model",
            "Turi",
            "Ishlab chiqilgan davlat",
            "Ishlab chiqilgan yili",
            "Harid qilingan summasi (buxgalteriya balans summasi)",
            "Buxgalteriya bo'yicha qoldiq summasi",
            "Moliyalashtirish manbasi",
            "Loyiha shifri",
            "Shartnoma raqami (uskuna bo'yicha)",
            "Shartnoma sanasi",
            "Harid qilingan yili",
            "Holati",
            "O‘rnatilgan yili",
            "Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya) nomi",
            "Foydalanishga mas'ul tarkibiy bo‘linma (kafedra) nomi",
            "F.I.Sh",
            "Javobgar etib belgilanganligi to‘g‘risida buyruq raqami",
            "Javobgar etib belgilanganligi to‘g‘risida buyruq sanasi",
            "Bajarilayotgan ilmiy-tadqiqot ishlari",
            "Ilmiy-tadqiqot dasturlaridagi ish hajmi",
            "Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasi",
            "Foydalanish uchun arizalarning ro‘yxatga olinishi va foydalanish jadvalining yuritilishi",
            "Ilmiy tadqiqot va oliy ta’lim muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalarga ehtiyoji",
            "Zarur sarflash materiallari va butlovchi qismlar bo‘yicha ehtiyoji",
        ];
    }
}
