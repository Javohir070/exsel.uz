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
            return [
                'id' => $ilmiytezislar->id,
                'Tashkilot nomi' => $ilmiytezislar->tashkilot->name,
                'Dalolatnoma nomi' => $ilmiytezislar->mavzusi,
                'Dalolatnoma raqami' => $ilmiytezislar->raqami,
                'Joriy etish obyekti' => $ilmiytezislar->joyiye_obyekti,
                'Joriy etish maqsadi' => $ilmiytezislar->joyiye_maqsadi,
                'Joriy etish uchun asos' => $ilmiytezislar->joyiye_asos,
                'Joriy etilgan tashkilot' => $ilmiytezislar->joyiye_tashkilot,
                'Joriy etilgan tarmoq' => $ilmiytezislar->joyiye_tarmoq,
                'Asoslovchi hujjat(elektron variant)' => $ilmiytezislar->asoslovchi_hujjat,
            ];
        });
    }


    public function headings(): array
    {
        return [
            'id',
            'Tashkilot nomi',
            'Dalolatnoma nomi',
            'Dalolatnoma raqami',
            'Joriy etish obyekti',
            'Joriy etish maqsadi',
            'Joriy etish uchun asos',
            'Joriy etilgan tashkilot',
            'Joriy etilgan tarmoq',
            'Asoslovchi hujjat(elektron variant)',
        ];
    }

}
