<?php

namespace App\Exports;

use App\Models\Doktaranturaexpert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class DoktaranturaexpertExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Doktaranturaexpert::with('tashkilot')->where('quarter', 2)->get()->map(function ($doktaranturaexpert) {
            return [
                'id' => $doktaranturaexpert->tashkilot->id,
                "Tashkilot nomi" => $doktaranturaexpert->tashkilot->name,
                "Turi" => $doktaranturaexpert->tashkilot->tashkilot_turi,
                "region_id" => $doktaranturaexpert->tashkilot->region_id,
                "Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni." => $doktaranturaexpert->umumiy_izlanuvchilar,
                "Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni." => $doktaranturaexpert->yagonae_tah_soni,
                "Chetlashtirilgan izlanuvchilar soni." => $doktaranturaexpert->chetlash_soni,
                "Akademik ta’tildagi izlanuvchilar soni." => $doktaranturaexpert->akademik_soni,
                "Muddatidan oldin himoya qilgan izlanuvchilar soni." => $doktaranturaexpert->muddatidano_soni,
                "Yagona elektron tizimga kiritilmagan izlanuvchilar soni" => $doktaranturaexpert->kiritilmagan_soni,
                "Yakka tartibdagi rejani bajarmagan izlanuvchilar soni " => $doktaranturaexpert->rejani_bajarmagan,
                "Monitoring natijasi kiritilmagan izlanuvchilar soni " => $doktaranturaexpert->mon_nat_kiritilmagan,
                "Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni " => $doktaranturaexpert->biriktirilgan_rahbarlar,
                "Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud bo'lmagan ilmiy rahbarlar soni " => $doktaranturaexpert->kollegial_rahbarlar,
                "Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni " => $doktaranturaexpert->meyoridan_rahbarlar,
                "Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni " => $doktaranturaexpert->tash_ortiq_rahbarlar,
                "Ekspert xulosasi" => $doktaranturaexpert->status,
                "Izoh" => $doktaranturaexpert->comment,
                "Ishchi guruh rahbari F.I.Sh" => $doktaranturaexpert->fish,
                "Ishchi guruh azosi F.I.Sh" => $doktaranturaexpert->user->name,
                "Ekspert F.I.Sh" => $doktaranturaexpert->ekspert_fish,
                "Tashkilotning mas'ul rahbari  F.I.Sh" => $doktaranturaexpert->t_masul,
                "Chorak" => $doktaranturaexpert->quarter,
            ];
        });
    }



    public function headings(): array
    {
        return [
            'id',
            "Tashkilot nomi",
            "Turi",
            "region_id",
            "Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni.",
            "Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.",
            "Chetlashtirilgan izlanuvchilar soni.",
            "Akademik ta’tildagi izlanuvchilar soni.",
            "Muddatidan oldin himoya qilgan izlanuvchilar soni.",
            "Yagona elektron tizimga kiritilmagan izlanuvchilar soni",
            "Yakka tartibdagi rejani bajarmagan izlanuvchilar soni ",
            "Monitoring natijasi kiritilmagan izlanuvchilar soni ",
            "Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni ",
            "Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud bo'lmagan ilmiy rahbarlar soni ",
            "Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni ",
            "Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni ",
            "Ekspert xulosasi",
            "Izoh",
            "Ishchi guruh rahbari F.I.Sh",
            "Ishchi guruh azosi F.I.Sh",
            "Ekspert F.I.Sh",
            "Tashkilotning mas'ul rahbari  F.I.Sh",
            "Chorak",
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
                $sheet->getColumnDimension('D')->setWidth(10);
                $sheet->getColumnDimension('E')->setWidth(10);
                $sheet->getColumnDimension('F')->setWidth(10);
                $sheet->getColumnDimension('G')->setWidth(10);
                $sheet->getColumnDimension('H')->setWidth(10);
                $sheet->getColumnDimension('I')->setWidth(10);
                $sheet->getColumnDimension('J')->setWidth(10);
                $sheet->getColumnDimension('K')->setWidth(10);
                $sheet->getColumnDimension('L')->setWidth(10);
                $sheet->getColumnDimension('M')->setWidth(10);
                $sheet->getColumnDimension('N')->setWidth(10);
                $sheet->getColumnDimension('O')->setWidth(10);
                $sheet->getColumnDimension('P')->setWidth(10);
                $sheet->getColumnDimension('Q')->setWidth(40);
                $sheet->getColumnDimension('R')->setWidth(60);
                $sheet->getColumnDimension('S')->setWidth(40);
                $sheet->getColumnDimension('T')->setWidth(40);
                $sheet->getColumnDimension('U')->setWidth(40);
                $sheet->getColumnDimension('V')->setWidth(40);
                $sheet->getColumnDimension('W')->setWidth(10);

                // 🔹 Header dizayni
                $sheet->getStyle('A1:W1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['rgb' => 'E7F3FF'],
                    ],
                ]);

                // 🔹 Border
                $sheet->getStyle("A1:W{$highestRow}")
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                            ],
                        ],
                    ]);

                // 🔹 Markaz (hammasi)
                $sheet->getStyle("A2:W{$highestRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT);

                // 🔹 ENG MUHIM QISM 🔥
                // Tashkilot nomi — chapga + wrap text
                $sheet->getStyle("B2:B{$highestRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);
                $sheet->getStyle("R2:R{$highestRow}")
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
