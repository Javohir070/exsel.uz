<?php

namespace App\Exports;

use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TashkilotExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function collection()
    {
        return Tashkilot::get()->map(function ($tashkilot) {
            return [
                $tashkilot->id,
                $tashkilot->region_id,
                $tashkilot->name,
                $tashkilot->stir_raqami,
                $tashkilot->status ?? 0,
                $tashkilot->ilmiyloyiha_is ?? 0,
                $tashkilot->doktarantura_is ?? 0,
                $tashkilot->doktaranturalar->where('quarter', 2)->count(),
                $tashkilot->doktaranturaexperts->where('quarter', 2)->count() ?? 0,
            ];
        });
    }


    public function headings(): array
      {
          return [
            'ID',
            'Viloyat id',
            'Tashkilot nomi',
            'STIR raqami',
            'status',
            'ilmiyloyiha_is',
            'doktarantura_is',
            'Ilmiy izlanuvchilar nafar',
            'monitoring',
          ];
      }
}
