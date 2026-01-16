<?php

namespace App\Exports;

use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TashkilotExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    public function collection()
    {
        return Tashkilot::with('region')->get()->map(function ($tashkilot) {
            return [
                $tashkilot->id,
                $tashkilot->region_id,
                $tashkilot->name,
                $tashkilot->tashkilot_turi,
                $tashkilot->stir_raqami,
                optional($tashkilot->region)->oz,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Viloyat ID',
            'Tashkilot nomi',
            'Tashkilot turi',
            'STIR raqami',
            'Viloyat nomi',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical'   => Alignment::VERTICAL_CENTER,
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
                $sheet->getColumnDimension('A')->setWidth(6);   // ID
                $sheet->getColumnDimension('B')->setWidth(10);  // Viloyat ID
                $sheet->getColumnDimension('C')->setWidth(60);  // Tashkilot nomi
                $sheet->getColumnDimension('D')->setWidth(20);
                $sheet->getColumnDimension('E')->setWidth(18);
                $sheet->getColumnDimension('F')->setWidth(25);

                // 🔹 Header dizayni
                $sheet->getStyle('A1:F1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['rgb' => 'E7F3FF'],
                    ],
                ]);

                // 🔹 Border
                $sheet->getStyle("A1:F{$highestRow}")
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                            ],
                        ],
                    ]);

                // 🔹 Markaz (hammasi)
                $sheet->getStyle("A2:B{$highestRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // 🔹 ENG MUHIM QISM 🔥
                // Tashkilot nomi — chapga + wrap text
                $sheet->getStyle("C2:C{$highestRow}")
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
