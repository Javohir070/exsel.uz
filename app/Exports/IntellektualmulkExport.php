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
            // $url = asset('storage/' . $intellektualmulk->asoslovchi_hujjat);
            // JSON ma'lumotni massivga aylantirish
            // $mualaliflar = collect(json_decode($intellektualmulk->mualliflar_json))->map(function ($mualif) {
            //     return $mualif->name; // Har bir muallifning faqat ismini olish
            // })->implode(', '); // Vergul bilan ajratilgan ro'yxatga aylantirish
            return [
                'id' => $intellektualmulk->id,
                'Tashkilot nomi' => $intellektualmulk->tashkilot->name,
                'region_id' => $intellektualmulk->tashkilot->region_id,
                'Mavzu' => $intellektualmulk->mavzu,
                // 'Hammualiflar' => $intellektualmulk->mualliflar_json,
                'Chop qilingan yili' => $intellektualmulk->nashr_sana,
                'Seriyasi/ soni' => $intellektualmulk->soni,
                'Annotatsiya' => $intellektualmulk->annotatsiya,
                'Fan yo‘nalishi' => $intellektualmulk->fan_yunalishi,
                'Tashkilot turi' => $intellektualmulk->tashkilot->tashkilot_turi ?? "otm",
            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'Tashkilot nomi',
            'region_id',
            'Mavzu',
            // 'Hammualiflar',
            'Chop qilingan yili',
            'Seriyasi/ soni',
            'Annotatsiya',
            'Fan yo‘nalishi',
            'Tashkilot turi',
        ];
    }
}
