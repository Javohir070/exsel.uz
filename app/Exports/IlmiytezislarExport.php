<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Ilmiytezislar;
use Maatwebsite\Excel\Concerns\FromCollection;

class IlmiytezislarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ilmiytezislar::with('tashkilot')->get()->map(function ($ilmiytezislar){
            // JSON ma'lumotni massivga aylantirish
            // $mualaliflar = collect(json_decode($ilmiytezislar->mualliflar_json))->map(function ($mualif) {
            //     return $mualif->name; // Har bir muallifning faqat ismini olish
            // })->implode(', '); // Vergul bilan ajratilgan ro'yxatga aylantirish
            return [
                'id' => $ilmiytezislar->id,
                'Tashkilot nomi' => $ilmiytezislar->tashkilot->name,
                'Mavzu' => $ilmiytezislar->mavzu,
                // 'Hammualiflar' => $ilmiytezislar->mualliflar_json,
                'Chop qilingan sana' => $ilmiytezislar->chopq_sana,
                'Konferensiya to‘liq nomi' => $ilmiytezislar->kon_full_nomi,
                'Konferensiya qisqa nomi' => $ilmiytezislar->kon_qisqa_nomi,
                'Seriyasi/ soni' => $ilmiytezislar->soni,
                'Nashriyot' => $ilmiytezislar->nashriyot,
                'Annotatsiya' => $ilmiytezislar->annotatsiya,
                'Fan yo‘nalishi' => $ilmiytezislar->fan_yunalishi,
                'URL' => $ilmiytezislar->url,
                'DOI' => $ilmiytezislar->doi,
                'Tashkilot turi' => $dalolatnoma->tashkilot->tashkilot_turi ?? "otm",
            ];
        });
    }


    public function headings(): array
    {
        return [
            'id',
            'Tashkilot nomi',
            'Mavzu',
            // 'Hammualiflar',
            'Chop qilingan sana',
            'Konferensiya to‘liq nomi',
            'Konferensiya qisqa nomi',
            'Seriyasi/ soni',
            'Nashriyot',
            'Annotatsiya',
            'Fan yo‘nalishi',
            'URL',
            'DOI',
            'Tashkilot turi',
        ];
    }

}
