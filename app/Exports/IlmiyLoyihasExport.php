<?php

namespace App\Exports;

use App\Models\IlmiyLoyiha;
use App\Models\Monitoring;
use App\Models\Tekshirivchilar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IlmiyLoyihasExport implements FromCollection, WithHeadings
{
    public const HOLAT_QILINGAN = 'Monitoring qilingan';
    public const HOLAT_JARAYONDA = 'Jarayonda';
    public const HOLAT_RAD_ETILGAN = 'Rad etilgan';
    public const HOLAT_QILINMAGAN = 'Monitoring qilinmagan';

    /**
     * Status shu monitoring davri bo'yicha hisoblanadi: faol davr, u bo'lmasa eng oxirgi davr.
     */
    protected ?Monitoring $monitoring;

    public function __construct()
    {
        $this->monitoring = Monitoring::getActive() ?? Monitoring::latest('id')->first();
    }

    /**
     * Loyihaning shu davrdagi tekshiruv yozuviga (tekshirivchilars) qarab monitoring holati.
     */
    public static function monitoringHolati(?Tekshirivchilar $tekshiruv): string
    {
        if (! $tekshiruv) {
            return self::HOLAT_QILINMAGAN;
        }

        return match (mb_strtolower(trim((string) $tekshiruv->holati))) {
            'tasdiqlandi' => self::HOLAT_QILINGAN,
            'rad etildi' => self::HOLAT_RAD_ETILGAN,
            // 'yuborildi' yoki holati hali belgilanmagan: ishchi guruh yuborgan, ekspert tasdiqlamagan
            default => self::HOLAT_JARAYONDA,
        };
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $monitoringId = $this->monitoring?->id;

        return IlmiyLoyiha::with([
            'tashkilot',
            'laboratory',
            // faqat shu davrdagi tekshiruvlar (tekshirivchilars.quarter = monitoring id);
            // monitoring davri umuman bo'lmasa, hech qaysi tekshiruv olinmaydi
            'tekshirivchilars' => function ($query) use ($monitoringId) {
                $monitoringId ? $query->where('quarter', $monitoringId) : $query->whereRaw('1 = 0');
            },
        ])->where('is_active', 1)->get()->map(function ($ilmiyloyhalar){
            return [
                'id' => $ilmiyloyhalar->id,
                'Tashkilot id' => $ilmiyloyhalar->tashkilot->id,
                'is active' => $ilmiyloyhalar->tashkilot->ilmiyloyiha_is,
                'Tashkilot' => $ilmiyloyhalar->tashkilot->name,
                'Tashkilot turi' => $ilmiyloyhalar->tashkilot->tashkilot_turi == 'otm' ? 'OTM' : ($ilmiyloyhalar->tashkilot->tashkilot_turi == 'itm'? 'ITM':'boshqa'),
                'Tashkilot stir' => $ilmiyloyhalar->tashkilot->stir_raqami ?? null,
                'Viloyat' => $ilmiyloyhalar->tashkilot->region->oz ?? null,
                'Loyiha mavzusi' => $ilmiyloyhalar->mavzusi  ?? null,
                'Loyiha turi' => $ilmiyloyhalar->turi  ?? null,
                'Loyiha rahbarining F.I.Sh' => $ilmiyloyhalar->rahbar_name  ?? null,
                'Raqami' => $ilmiyloyhalar->raqami  ?? null,
                'Loyiha dasturi' => $ilmiyloyhalar->dastyri  ?? null,
                'Qo‘shma loyiha bo‘yicha hamkor tashkilot' => $ilmiyloyhalar->q_hamkor_tashkilot  ?? null,
                'Xalqaro qo‘shma loyihalardagi hamkor davlat' => $ilmiyloyhalar->hamkor_davlat  ?? null,
                'Loyihani amalga oshirish muddati (yil)' => $ilmiyloyhalar->muddat  ?? null,
                'Loyihaning boshlanish sanasi' => $ilmiyloyhalar->bosh_sana  ?? null,
                'Loyihaning yakunlanish sanasi' => $ilmiyloyhalar->tug_sana  ?? null,
                'Fan yo‘nalish' => $ilmiyloyhalar->pan_yunalish  ?? null,
                'Sanasi' => $ilmiyloyhalar->sanasi  ?? null,
                'Summasi (ming so‘mda)' => $ilmiyloyhalar->sum  ?? null,
                // '2017 yil' => $ilmiyloyhalar->umumiyyil->y2017 ?? 0,
                // '2018 yil' => $ilmiyloyhalar->umumiyyil->y2018 ?? 0,
                // '2019 yil' => $ilmiyloyhalar->umumiyyil->y2019 ?? 0,
                // '2020 yil' => $ilmiyloyhalar->umumiyyil->y2020 ?? 0,
                // '2021 yil' => $ilmiyloyhalar->umumiyyil->y2021 ?? 0,
                // '2022 yil' => $ilmiyloyhalar->umumiyyil->y2022 ?? 0,
                // '2023 yil' => $ilmiyloyhalar->umumiyyil->y2023 ?? 0,
                // '2024 yil' => $ilmiyloyhalar->umumiyyil->y2024 ?? 0,
                'Olingan asosiy natija' => $ilmiyloyhalar->olingan_natija,
                'Joriy etish (Tatbiq etish) holati' => $ilmiyloyhalar->joriy_holati,
                'Tijoratlashtirish holati' => $ilmiyloyhalar->tijoratlashtirish,
                'is_active' => $ilmiyloyhalar->is_active ?? 0,
                'Status' => $ilmiyloyhalar->status ?? 0,
                // 'laboratory' => $ilmiyloyhalar->laboratory->id ?? 0,
                // 'laboratory nomi' => $ilmiyloyhalar->laboratory->name ?? 0,
                // bir davrda bir nechta yozuv bo'lsa, eng oxirgisi hisobga olinadi
                'Monitoring holati' => self::monitoringHolati($ilmiyloyhalar->tekshirivchilars->sortByDesc('id')->first()),

            ];
        });
    }

    public function headings(): array
    {
        return [
            'id',
            'Tashkilot id',
            'is active',
            'Tashkilot',
            'Tashkilot turi',
            'Tashkilot stir',
            'Viloyat',
            'Loyiha mavzusi',
            'Loyiha turi',
            'Loyiha rahbarining F.I.Sh',
            'Raqami',
            'Loyiha dasturi',
            'Qo‘shma loyiha bo‘yicha hamkor tashkilot',
            'Xalqaro qo‘shma loyihalardagi hamkor davlat',
            'Loyihani amalga oshirish muddati (yil)',
            'Loyihaning boshlanish sanasi',
            'Loyihaning yakunlanish sanasi',
            'Fan yo‘nalish',
            'Sanasi',
            'Summasi (ming so‘mda)',
            // '2017 yil' ,
            // '2018 yil' ,
            // '2019 yil' ,
            // '2020 yil' ,
            // '2021 yil' ,
            // '2022 yil' ,
            // '2023 yil' ,
            // '2024 yil' ,
            'Olingan asosiy natija',
            'Joriy etish (Tatbiq etish) holati',
            'Tijoratlashtirish holati',
            'Active',
            'Status',
        //     'laboratory',
        //    'laboratory nomi',
            $this->monitoring
                ? 'Monitoring holati (' . $this->monitoring->year . '-yil, ' . $this->monitoring->quarter?->value . '-chorak)'
                : 'Monitoring holati',
        ];
    }
}
