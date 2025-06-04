<?php

namespace App\Exports;

use App\Models\Stajirovkaexpert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StajirovkalarToMonitoringExport implements FromCollection, WithHeadings
{
    public function collection()
    {
       return Stajirovkaexpert::with('tashkilot', 'stajirovkalar')->get()->map(function ($stajirovkaexpert){
            return [
                'id' => $stajirovkaexpert->id,
                'Stajorning F.I.Sh' => $stajirovkaexpert->stajirovkalar->fish,
                'Stajorning lavozimi' => $stajirovkaexpert->stajirovkalar->lavozim,
                'Stajirovkaga yuborilgan yili' => $stajirovkaexpert->stajirovkalar->yil,
                "Ilmiy stajirovka yo‘nalishi" => $stajirovkaexpert->stajirovkalar->yunalishi,
                'Ijrochi tashkilot (OTM/ITM nomi)' => $stajirovkaexpert->tashkilot->name,
                'Ilmiy hisobot taqdim etilganligi' => $stajirovkaexpert->ilmiy_hisobot,
                "Stajirovka davrida egallangan bilim va ko'nikmalarni amalga oshirilishi uchun zarur shart-sharoitlar yaratilganligi. (Asoslantiruvchi hujjatlar, rasm va videolar)" => $stajirovkaexpert->egallangan_bilim,
                "Ilmiy-tadqiqot ishlari natijalari bo'yicha xorijiy ilmiy anjumanlarda ma'ruza bilan ishtirok etganligi. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar)" => $stajirovkaexpert->ishlar_natijalari,
                "Xalqaro tan olingan ma'lumotlar bazasidagi yetakchi ilmiy jurnallarda nashr qilinganligi"=> $stajirovkaexpert->xalqarotan_jur_nashr,
                "Kamida bir yil davomida Agentlik tomonidan tashkil etiladigan va boshqa tadbirlarda stajirovka davrida to'plangan tajribalar va olgan bilim va ko'nikmalari borasida o'z fikr va mulohazalarini bayon etilganligi tafsiloti. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar)" => $stajirovkaexpert->biryil_davomida,
                'Monitoring xulosasi (qoniqarli/qoniqarsiz)' => $stajirovkaexpert->status,
                'Izoh' => $stajirovkaexpert->comment,
                "Ishchi guruh rahbari F.I.Sh"=> $stajirovkaexpert->fish,
                "Ishchi guruh azosi F.I.Sh"=> $stajirovkaexpert->user->name,
                "Ekspert F.I.Sh"=> $stajirovkaexpert->ekspert_fish,
                "Tashkilotning mas'ul rahbari F.I.Sh"=> $stajirovkaexpert->t_masul,

            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'Stajorning F.I.Sh',
            'Stajorning lavozimi',
            'Stajirovkaga yuborilgan yili',
            "Ilmiy stajirovka yo‘nalishi",
            'Ijrochi tashkilot (OTM/ITM nomi)',
            'Ilmiy hisobot taqdim etilganligi',
            "Stajirovka davrida egallangan bilim va ko'nikmalarni amalga oshirilishi uchun zarur shart-sharoitlar yaratilganligi. (Asoslantiruvchi hujjatlar, rasm va videolar)",
            "Ilmiy-tadqiqot ishlari natijalari bo'yicha xorijiy ilmiy anjumanlarda ma'ruza bilan ishtirok etganligi. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar)",
            "Xalqaro tan olingan ma'lumotlar bazasidagi yetakchi ilmiy jurnallarda nashr qilinganligi",
            "Kamida bir yil davomida Agentlik tomonidan tashkil etiladigan va boshqa tadbirlarda stajirovka davrida to'plangan tajribalar va olgan bilim va ko'nikmalari borasida o'z fikr va mulohazalarini bayon etilganligi tafsiloti. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar)",
            'Monitoring xulosasi (qoniqarli/qoniqarsiz)',
            'Izoh',
            "Ishchi guruh rahbari F.I.Sh",
            "Ishchi guruh azosi F.I.Sh",
            "Ekspert F.I.Sh",
            "Tashkilotning mas'ul rahbari F.I.Sh",
        ];
    }
}
