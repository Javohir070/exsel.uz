<?php

namespace App\Exports;

use App\Models\Xodimlar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TashkilotXodimlarExport implements FromCollection, WithHeadings
{
        protected $tashkilotId;

        public function __construct($tashkilotId)
        {
            $this->tashkilotId = $tashkilotId;
        }

        public function collection()
        {
            return Xodimlar::where('tashkilot_id', $this->tashkilotId)->get()->map(function($xodimlar) {
                return [
                    "id" => $xodimlar->id,
                    "Tashkilot" => $xodimlar->tashkilot->name,
                    "Fish" => $xodimlar->fish,
                    "Jshshir" => $xodimlar->jshshir,
                    "Tug'ilgan yil" => $xodimlar->yil,
                    "Jinsi" => $xodimlar->jinsi,
                    "Ish tartibi" => $xodimlar->ish_tartibi,
                    "Shtat birligi" => $xodimlar->shtat_birligi,
                    "O‘rindoshlik asosida ishlaydigan xodimning asosiy ish joyi bo‘lgan tashkilot" => $xodimlar->urindoshlik_asasida,
                    "Pedagogik faoliyat bilan shug‘ullanishi" => $xodimlar->pedagoglik,
                    "Lavozimi" => $xodimlar->lavozimi,
                    "Ma’lumoti" => $xodimlar->malumoti,
                    "O‘zbekiston Fanlar akademiyasi haqiqiy a’zosi" => $xodimlar->uzbek_panlar_azosi,
                    "Ilmiy darajasi" => $xodimlar->ilmiy_daraja,
                    "Ilmiy daraja olingan yili" => $xodimlar->ilmiy_daraja_yil,
                    "Ilmiy unvoni" => $xodimlar->ilmiy_unvoni,
                    "Ilmiy unvon olingan yili" => $xodimlar->ilmiy_unvoni_y,
                    "Ixtisosligi" => $xodimlar->ixtisosligi,
                    "Telefon" => $xodimlar->phone,
                    "E-mail" => $xodimlar->email,
                ];
            });
        }

        public function headings(): array
        {
            return [
                "ID",
                "Tashkilot",
                "F.I.SH.",
                "Tug'ilgan yili",
                "Jinsi",
                "Ish tartibi",
                "Shtat birligi",
                "O‘rindoshlik asosida ishlaydigan xodimning asosiy ish joyi",
                "Pedagogik faoliyat bilan shug‘ullanishi",
                "Lavozimi",
                "Ma’lumoti",
                "O‘zbekiston Fanlar akademiyasi haqiqiy a’zosi",
                "Ilmiy darajasi",
                "Ilmiy daraja olingan yili",
                "Ilmiy unvoni",
                "Ilmiy unvon olingan yili",
                "Ixtisosligi",
                "Telefon",
                "E-mail",
            ];
        }
}
