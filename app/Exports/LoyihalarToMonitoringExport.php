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
       return Tekshirivchilar::with('tashkilot', 'ilmiyLoyihalar')->where('quarter', 2)->get()->map(function ($tekshirivchilar){
            return [
                'id' => $tekshirivchilar->ilmiyLoyihalar->id,
                "Tashkilot nomi" => $tekshirivchilar->tashkilot->name,
                "Turi" => $tekshirivchilar->tashkilot->tashkilot_turi ?? null,
                "region_id" => $tekshirivchilar->tashkilot->region_id ?? null,
                'Loyiha mavzusi' => $tekshirivchilar->ilmiyLoyihalar->mavzusi,
                'Loyiha turi' => $tekshirivchilar->ilmiyLoyihalar->turi,
                'Loyiha shifri' => $tekshirivchilar->ilmiyLoyihalar->raqami,
                'Ijrochi tashkilot (OTM/ITM nomi)' => $tekshirivchilar->tashkilot->name,
                "Fan yo'nalishi" => $tekshirivchilar->ilmiyLoyihalar->pan_yunalish,
                'Loyiha rahbari ismi-sharifi' => $tekshirivchilar->ilmiyLoyihalar->rahbar_name,
                'Boshlanish sanasi' => \Carbon\Carbon::parse($tekshirivchilar->ilmiyLoyihalar->bosh_sana)->format('Y-m-d'),
                'Tugash sanasi' => \Carbon\Carbon::parse($tekshirivchilar->ilmiyLoyihalar->tug_sana)->format('Y-m-d'),
                'Loyihaning umumiy qiymati' => $tekshirivchilar->ilmiyLoyihalar->sum,
                'Monitoring xulosasi (qoniqarli/qoniqarsiz)' => $tekshirivchilar->status,
                "Ekspert F.I.Sh"=>$tekshirivchilar->ekspert_fish ?? null,
                'Izoh' => $tekshirivchilar->comment,

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
            'Loyiha mavzusi',
            'Loyiha turi',
            'Loyiha shifri',
            'Ijrochi tashkilot (OTM/ITM nomi)',
            "Fan yo'nalishi",
            'Loyiha rahbari ismi-sharifi',
            'Boshlanish sanasi',
            'Tugash sanasi',
            'Loyihaning umumiy qiymati',
            'Monitoring xulosasi (qoniqarli/qoniqarsiz)',
            "Ekspert F.I.Sh",
            'Izoh',
        ];
    }
}
