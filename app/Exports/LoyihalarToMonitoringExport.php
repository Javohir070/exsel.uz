<?php

namespace App\Exports;

use App\Models\IlmiyLoyiha;
use App\Models\Tekshirivchilar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoyihalarToMonitoringExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Tekshirivchilar::with('tashkilot', 'ilmiyLoyihalar')->where('is_active', 1)->get()->map(function ($tekshirivchilar){
            return [
                'id' => $tekshirivchilar->ilmiyLoyihalar->id,
                'Loyiha mavzusi' => $tekshirivchilar->ilmiyLoyihalar->mavzusi,
                'Loyiha turi' => $tekshirivchilar->ilmiyLoyihalar->turi,
                'Loyiha shifri' => $tekshirivchilar->ilmiyLoyihalar->raqami,
                'Ijrochi tashkilot (OTM/ITM nomi)' => $tekshirivchilar->tashkilot->name,
                "Fan yo'nalishi" => $tekshirivchilar->ilmiyLoyihalar->pan_yunalish,
                'Loyiha rahbari ismi-sharifi' => $tekshirivchilar->ilmiyLoyihalar->rahbar_name,
                'Bajarish muddati' => $tekshirivchilar->ilmiyLoyihalar->tug_sana,
                'Loyihaning umumiy qiymati' => $tekshirivchilar->ilmiyLoyihalar->sum,
                'Monitoring xulosasi (qoniqarli/qoniqarsiz)' => $tekshirivchilar->status,
                'Izoh' => $tekshirivchilar->comment,

            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'Loyiha mavzusi',
            'Loyiha turi',
            'Loyiha shifri',
            'Ijrochi tashkilot (OTM/ITM nomi)',
            "Fan yo'nalishi",
            'Loyiha rahbari ismi-sharifi',
            'Bajarish muddati',
            'Loyihaning umumiy qiymati',
            'Monitoring xulosasi (qoniqarli/qoniqarsiz)',
            'Izoh',
        ];
    }
}
