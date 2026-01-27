<?php

namespace App\Exports;

use App\Models\Doktarantura;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class DoktaranturaExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{

    public function collection()
    {
        return Doktarantura::where('quarter', 2)
            ->with('tashkilot')->get()->map(function ($doktarantura) {
                return [
                    $doktarantura->id,
                    $doktarantura->tashkilot->name,
                    $doktarantura->tashkilot->tashkilot_turi,
                    $doktarantura->full_name,
                    $doktarantura->direction_name,
                    $doktarantura->direction_code,
                    $doktarantura->dc_type,
                    $doktarantura->admission_year,
                    $doktarantura->admission_quarter,
                    $doktarantura->advisor,
                    $doktarantura->course,
                    $doktarantura->monitoring_1,
                    $doktarantura->monitoring_2,
                    $doktarantura->monitoring_3,
                    $doktarantura->reja_t,
                    $doktarantura->reja_b,
                    $doktarantura->monitoring_natijasik,
                    $doktarantura->himoya_holati,
                    $doktarantura->quarter,
                ];
            });
    }

    public function headings(): array
    {
        return [
            "ID",
            "Tashkilot",
            "Tashkilot turi",
            "F.I.SH.",
            "Dissertatsiya mavzusi",
            "Ixtisoslik",
            "Ta'lim turi",
            "Qabul yili",
            "Qabul choragi",
            "Ilmiy rahbar",
            "Kurs",
            "Monitoring 1",
            "Monitoring 2",
            "Monitoring 3",
            "Yakka tartibdagi reja tasdiqlanganligi",
            "Yakka tartibdagi rejani bajarganligi",
            "Monitoring natijasi kiritilganligi",
            'Himoya holati',
            'Chorak',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();

                // 🔹 Ustun kengliklari (eng muhim joy)
                $sheet->getColumnDimension('A')->setWidth(10);   // ID
                $sheet->getColumnDimension('B')->setWidth(60);  // Tashkilot nomi
                $sheet->getColumnDimension('C')->setWidth(10);  // Tashkilot turi
                $sheet->getColumnDimension('D')->setWidth(40);
                $sheet->getColumnDimension('E')->setWidth(40);
                $sheet->getColumnDimension('F')->setWidth(10);
                $sheet->getColumnDimension('G')->setWidth(40);
                $sheet->getColumnDimension('H')->setWidth(10);
                $sheet->getColumnDimension('I')->setWidth(10);
                $sheet->getColumnDimension('J')->setWidth(40);
                $sheet->getColumnDimension('K')->setWidth(10);
                $sheet->getColumnDimension('L')->setWidth(30);
                $sheet->getColumnDimension('M')->setWidth(30);
                $sheet->getColumnDimension('N')->setWidth(30);
                $sheet->getColumnDimension('O')->setWidth(30);
                $sheet->getColumnDimension('P')->setWidth(10);
                $sheet->getColumnDimension('Q')->setWidth(10);
                $sheet->getColumnDimension('R')->setWidth(30);
                $sheet->getColumnDimension('S')->setWidth(10);

                // 🔹 Header dizayni
                $sheet->getStyle('A1:S1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['rgb' => 'E7F3FF'],
                    ],
                ]);

                // 🔹 Border
                $sheet->getStyle("A1:S{$highestRow}")
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                            ],
                        ],
                    ]);

                // 🔹 Markaz (hammasi)
                $sheet->getStyle("A2:S{$highestRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT);

                // 🔹 ENG MUHIM QISM 🔥
                // Tashkilot nomi — chapga + wrap text
                $sheet->getStyle("B2:B{$highestRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);

                // 🔹 Header muzlatish
                $sheet->freezePane('A2');
            },
        ];
    }
}
