<?php

namespace App\Exports;

use App\Models\Monografiyalar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonografiyaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Monografiyalar::with('tashkilot')->get()->map(function ($monografiyalar){
            $url = asset('storage/' . $monografiyalar->asoslovchi_hujjat);
            // JSON ma'lumotni massivga aylantirish
            $mualaliflar = collect(json_decode($monografiyalar->mualliflar_json))->map(function ($mualif) {
                return $mualif->name; // Har bir muallifning faqat ismini olish
            })->implode(', '); // Vergul bilan ajratilgan ro'yxatga aylantirish
            return [
                'id' => $monografiyalar->id,
                'Tashkilot nomi' => $monografiyalar->tashkilot->name,
                'Monografiya nomi' => $monografiyalar->name,
                'Mualaliflar' => $mualaliflar,
                'Nashr yili' => $monografiyalar->nashr_yili,
                'Til' => $monografiyalar->til,
                'Chop etilgan nashriyot' => $monografiyalar->chop_etil_nashriyot,
                'Fan yo‘nalishi' => $monografiyalar->fan_yunalishi,
                'Asoslovchi hujjat(elektron variant)' => $url,
                'KBK' => $monografiyalar->kbk,
                'ISBN' => $monografiyalar->isbn,
                'Tashkilot turi' => $monografiyalar->tashkilot->tashkilot_turi ?? "otm",
            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'Tashkilot nomi',
            'Monografiya nomi',
            'Mualaliflar',
            'Nashr yili',
            'Til',
            'Chop etilgan nashriyot',
            'Fan yo‘nalishi',
            'Asoslovchi hujjat(elektron variant)',
            'KBK',
            'ISBN',
            'Tashkilot turi',
        ];
    }
}
