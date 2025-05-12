<?php

namespace App\Exports;

use App\Models\Ilmiyrahbarlar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TashkilotIlmiyrahbarlarExport implements FromCollection, WithHeadings
{
     protected $tashkilotId;

        public function __construct($tashkilotId)
        {
            $this->tashkilotId = $tashkilotId;
        }

        public function collection()
        {
            return Ilmiyrahbarlar::where('tashkilot_id', $this->tashkilotId)->get()->map(function($ilmiyrahbarlar) {
                return [
                    "id" => $ilmiyrahbarlar->id,
                    "Tashkilot" => $ilmiyrahbarlar->tashkilot->name,
                    "Fish" => $ilmiyrahbarlar->full_name,
                    "Mazkur tashkilotdan biriktirilgan izlanuvchilar soni" => $ilmiyrahbarlar->org,
                    "Barcha tashkilotlardan biriktirilgan izlanuvchilar soni" => $ilmiyrahbarlar->all,
                ];
            });
        }

        public function headings(): array
        {
            return [
                "ID",
                "Tashkilot",
                "F.I.SH.",
                "Mazkur tashkilotdan biriktirilgan izlanuvchilar soni",
                "Barcha tashkilotlardan biriktirilgan izlanuvchilar soni",
            ];
        }
}
