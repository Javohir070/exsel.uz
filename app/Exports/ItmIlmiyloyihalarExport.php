<?php

namespace App\Exports;

use App\Models\IlmiyLoyiha;
use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItmIlmiyloyihalarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $itmOrganizations = Tashkilot::where('tashkilot_turi', 'itm')->pluck('id');

        return IlmiyLoyiha::with('tashkilot')
            ->whereIn('tashkilot_id', $itmOrganizations)
            ->get()
            ->map(function ($ilmiyloyhalar) {
                return [
                    'id' => $ilmiyloyhalar->id,
                'Tashkilot' => $ilmiyloyhalar->tashkilot->name,
                'Loyiha mavzusi' => $ilmiyloyhalar->mavzusi,
                'Loyiha turi' => $ilmiyloyhalar->turi,
                'Loyiha dasturi' => $ilmiyloyhalar->dastyri,
                'Qo‘shma loyiha bo‘yicha hamkor tashkilot' => $ilmiyloyhalar->q_hamkor_tashkilot,
                'Xalqaro qo‘shma loyihalardagi hamkor davlat' => $ilmiyloyhalar->hamkor_davlat,
                'Loyihani amalga oshirish muddati (yil)' => $ilmiyloyhalar->muddat,
                'Loyihaning boshlanish sanasi' => $ilmiyloyhalar->bosh_sana,
                'Loyihaning yakunlanish sanasi' => $ilmiyloyhalar->tug_sana,
                'Fan yo‘nalish' => $ilmiyloyhalar->pan_yunalish,
                'Loyiha rahbarining F.I.Sh' => $ilmiyloyhalar->rahbar_name,
                'Raqami' => $ilmiyloyhalar->raqami,
                'Sanasi' => $ilmiyloyhalar->sanasi,
                'Summasi (ming so‘mda)' => $ilmiyloyhalar->sum,
                '2017 yil' => $ilmiyloyhalar->umumiyyil->y2017,
                '2018 yil' => $ilmiyloyhalar->umumiyyil->y2018,
                '2019 yil' => $ilmiyloyhalar->umumiyyil->y2019,
                '2020 yil' => $ilmiyloyhalar->umumiyyil->y2020,
                '2021 yil' => $ilmiyloyhalar->umumiyyil->y2021,
                '2022 yil' => $ilmiyloyhalar->umumiyyil->y2022,
                '2023 yil' => $ilmiyloyhalar->umumiyyil->y2023,
                '2024 yil' => $ilmiyloyhalar->umumiyyil->y2024,
                'Olingan asosiy natija' => $ilmiyloyhalar->olingan_natija,
                'Joriy etish (Tatbiq etish) holati' => $ilmiyloyhalar->joriy_holati,
                'Tijoratlashtirish holati' => $ilmiyloyhalar->tijoratlashtirish,
                ];
            });
    }
    public function headings(): array
    {
        return [
            'id',
            'Tashkilot',
            'Loyiha mavzusi',
            'Loyiha turi',
            'Loyiha dasturi',
            'Qo‘shma loyiha bo‘yicha hamkor tashkilot',
            'Xalqaro qo‘shma loyihalardagi hamkor davlat',
            'Loyihani amalga oshirish muddati (yil)',
            'Loyihaning boshlanish sanasi',
            'Loyihaning yakunlanish sanasi',
            'Fan yo‘nalish',
            'Loyiha rahbarining F.I.Sh',
            'Raqami',
            'Sanasi',
            'Summasi (ming so‘mda)',
            '2017 yil' ,
            '2018 yil' ,
            '2019 yil' ,
            '2020 yil' ,
            '2021 yil' ,
            '2022 yil' ,
            '2023 yil' ,
            '2024 yil' ,
            'Olingan asosiy natija',
            'Joriy etish (Tatbiq etish) holati',
            'Tijoratlashtirish holati',
        ];
    }
}