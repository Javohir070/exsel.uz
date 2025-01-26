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
            return [
                'id' => $monografiyalar->id,
                'Tashkilot nomi' => $monografiyalar->tashkilot->name,
                'Monografiya nomi' => $monografiyalar->name,
                'Mualaliflar' => $monografiyalar->mualaliflar_json,
                'Nashr yili' => $monografiyalar->nashr_yili,
                'Til' => $monografiyalar->til,
                'Fan yo‘nalishi' => $monografiyalar->chop_etil_nashriyot,
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
            'Fan yo‘nalishi',
            'Asoslovchi hujjat(elektron variant)',
            'KBK',
            'ISBN',
            'Tashkilot turi',
        ];
    }
}
