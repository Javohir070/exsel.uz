<?php

namespace App\Exports;

use App\Models\Intellektualmulk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IntellektualmulkExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Intellektualmulk::with('tashkilot')->get()->map(function ($intellektualmulk){
            $url = asset('storage/' . $intellektualmulk->asoslovchi_hujjat);
            return [
                'id' => $intellektualmulk->id,
                'Tashkilot nomi' => $intellektualmulk->tashkilot->name,
                'Mavzu' => $intellektualmulk->mavzu,
                'Hammualiflar' => $intellektualmulk->mualaliflar,
                'Chop qilingan yili' => $intellektualmulk->nashr_sana,
                'Seriyasi/ soni' => $intellektualmulk->soni,
                'Annotatsiya' => $intellektualmulk->annotatsiya,
                'Fan yo‘nalishi' => $url,
                'Tashkilot turi' => $intellektualmulk->tashkilot->tashkilot_turi ?? "otm",
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
            'Chop qilingan yili',
            'Seriyasi/ soni',
            'Annotatsiya',
            'Fan yo‘nalishi',
            'Tashkilot turi',
        ];
    }
}
