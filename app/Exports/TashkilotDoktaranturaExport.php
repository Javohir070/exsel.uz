<?php

namespace App\Exports;

use App\Models\Doktarantura;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TashkilotDoktaranturaExport implements FromCollection, WithHeadings
{

    protected $tashkilotId;

    public function __construct($tashkilotId)
    {
        $this->tashkilotId = $tashkilotId;
    }


    public function collection()
        {
            return Doktarantura::get()->map(function($doktarantura) {
                return [
                    "id" => $doktarantura->id,
                    "Tashkilot" => $doktarantura->org_name,
                    "Fish" => $doktarantura->full_name,
                    "Dissertatsiya mavzusi" => $doktarantura->direction_name,
                    "Ixtisoslik" => $doktarantura->direction_code,
                    "Ta'lim turi" => $doktarantura->dc_type,
                    "Qabul yili" => $doktarantura->admission_year,
                    "Qabul choragi" => $doktarantura->admission_quarter,
                    "Ilmiy rahbar" => $doktarantura->advisor,
                    "Kurs" => $doktarantura->course,
                    // "Monitoring 1" => $doktarantura->monitoring_1,
                    // "Monitoring 2" => $doktarantura->monitoring_2,
                    // "Monitoring 3" => $doktarantura->monitoring_3,
                ];
            });
        }

        public function headings(): array
        {
            return [
                "ID",
                "Tashkilot",
                "F.I.SH.",
                "Dissertatsiya mavzusi",
                "Ixtisoslik",
                "Ta'lim turi",
                "Qabul yili",
                "Qabul choragi",
                "Ilmiy rahbar",
                "Kurs",
                // "Monitoring 1",
                // "Monitoring 2",
                // "Monitoring 3",
            ];
        }
}
