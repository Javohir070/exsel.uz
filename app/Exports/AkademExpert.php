<?php

namespace App\Exports;

use App\Models\Akadem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AkademExpert implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Akadem::get()->map(function($akadem){
            return [
                'id' => $akadem->id,
                "F.I.Sh" => $akadem->full_name,
                "Summa (ming soʻmda)" => $akadem->total_amount,
                "Yuboruvchi tashkilot" => $akadem->sender_organization_name,
                "Qabul qiluvchi tashkilot" => $akadem->receiver_organization_name,
                "monitoring" => $akadem->akademexpert->count(),
            ];
        });
    }

    public function headings(): array
      {
          return [
                'id',
                "F.I.Sh",
                "Summa (ming soʻmda)",
                "Yuboruvchi tashkilot",
                "Qabul qiluvchi tashkilot",
                "monitoring",
          ];
      }
}
