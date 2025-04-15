<?php

namespace App\Exports;

use App\Models\Kafedralar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KafedralarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kafedralar::with('tashkilot')->get()->map(function ($kafedralar) {
          return [
            'Tashkilot turi' => $kafedralar->tashkilot->tashkilot_turi,
            'Tashkilot nomi' => $kafedralar->tashkilot->name,
            'Kafedra nomi' => $kafedralar->name,
            'Tashkil etilgan yili' => $kafedralar->tash_yil,
          ];
        });
    }

    public function headings(): array
    {
        return [
            'Tashkilot turi',
            'Tashkilot nomi',
            'Kafedra nomi',
            'Tashkil etilgan yili',
        ];
    }
}
