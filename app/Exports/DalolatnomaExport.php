<?php

namespace App\Exports;

use App\Models\Dalolatnoma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DalolatnomaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dalolatnoma::with('tashkilot')->get()->map(function ($dalolatnoma) {
            // Fayl URLini olish
            $url = asset('storage/' . $dalolatnoma->asoslovchi_hujjat);
            // Yoki Storage orqali
            // $url = Storage::url($dalolatnoma->asoslovchi_hujjat);

            return [
                'id' => $dalolatnoma->id,
                'Tashkilot nomi' => $dalolatnoma->tashkilot->name,
                'Dalolatnoma nomi' => $dalolatnoma->mavzusi,
                'Dalolatnoma raqami' => $dalolatnoma->raqami,
                'Joriy etish obyekti' => $dalolatnoma->joyiye_obyekti,
                'Joriy etish maqsadi' => $dalolatnoma->joyiye_maqsadi,
                'Joriy etish uchun asos' => $dalolatnoma->joyiye_asos,
                'Joriy etilgan tashkilot' => $dalolatnoma->joyiye_tashkilot,
                'Joriy etilgan tarmoq' => $dalolatnoma->joyiye_tarmoq,
                'Asoslovchi hujjat(elektron variant)' => $url, // URLni qo'shish
                'Tashkilot turi' => $dalolatnoma->tashkilot->tashkilot_turi ?? "otm",
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
            'Tashkilot turi',
        ];
    }
}
