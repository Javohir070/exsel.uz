<?php

namespace App\Exports;

use App\Models\Ilmiymaqolalar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IlmiymaqolalarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ilmiymaqolalar::with('tashkilot')->get()->map(function ($ilmiymaqolalar) {
            // JSON ma'lumotni massivga aylantirish
            $mualaliflar = collect(json_decode($ilmiymaqolalar->mualliflar_json))->map(function ($mualif) {
                return $mualif->name; // Har bir muallifning faqat ismini olish
            })->implode(', '); // Vergul bilan ajratilgan ro'yxatga aylantirish
            return [
                'id' => $ilmiymaqolalar->id,
                'Tashkilot nomi' => $ilmiymaqolalar->tashkilot->name,
                'Mavzu' => $ilmiymaqolalar->mavzu,
                'Hammualiflar' => $mualaliflar,
                'Chop qilingan sana' => $ilmiymaqolalar->chopq_sana,
                'Jurnal nomi' => $ilmiymaqolalar->jurnal_nomi,
                'Seriyasi/Jurnal soni' => $ilmiymaqolalar->jurnal_soni,
                'Jurnal ISSN raqami' => $ilmiymaqolalar->jurnal_issn_raqami,
                'Nashriyot' => $ilmiymaqolalar->nashriyot,
                'Annotatsiya' => $ilmiymaqolalar->annotatsiya,
                'Fan yo‘nalishi' => $ilmiymaqolalar->fan_yunalishi,
                'URL' => $ilmiymaqolalar->url,
                'DOI' => $ilmiymaqolalar->doi,
                'Tashkilot turi' => $ilmiymaqolalar->tashkilot->tashkilot_turi ?? "otm",
            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'Tashkilot nomi',
            'Mavzu',
            'Hammualiflar',
            'Chop qilingan sana',
            'Jurnal nomi',
            'Seriyasi/Jurnal soni',
            'Jurnal ISSN raqami',
            'Nashriyot',
            'Annotatsiya',
            'Fan yo‘nalishi',
            'URL',
            'DOI',
            'Tashkilot turi',
        ];
    }
}
