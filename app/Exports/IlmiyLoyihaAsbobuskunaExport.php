<?php

namespace App\Exports;

use App\Models\IlmiyLoyiha;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IlmiyLoyihaAsbobuskunaExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return IlmiyLoyiha::query()
            ->with([
                'tashkilot.region',
                'asbobuskunalar.laboratory',
                'asbobuskunalar.kafedralar',
            ])
            ->whereHas('asbobuskunalar')
            ->orderBy('id')
            ->get()
            ->flatMap(function (IlmiyLoyiha $ilmiyLoyiha) {
                return $ilmiyLoyiha->asbobuskunalar->map(function ($asbobuskuna) use ($ilmiyLoyiha) {
                    $tashkilotTuri = $ilmiyLoyiha->tashkilot?->tashkilot_turi;

                    return [
                        $ilmiyLoyiha->id,
                        $ilmiyLoyiha->tashkilot?->id,
                        $ilmiyLoyiha->tashkilot?->name,
                        match ($tashkilotTuri) {
                            'otm' => 'OTM',
                            'itm' => 'ITM',
                            default => $tashkilotTuri ?? 'boshqa',
                        },
                        $ilmiyLoyiha->tashkilot?->stir_raqami,
                        $ilmiyLoyiha->tashkilot?->region?->oz,
                        $ilmiyLoyiha->mavzusi,
                        $ilmiyLoyiha->turi,
                        $ilmiyLoyiha->rahbar_name,
                        $ilmiyLoyiha->raqami,
                        $ilmiyLoyiha->dastyri,
                        $ilmiyLoyiha->q_hamkor_tashkilot,
                        $ilmiyLoyiha->hamkor_davlat,
                        $ilmiyLoyiha->muddat,
                        $ilmiyLoyiha->bosh_sana?->format('Y-m-d'),
                        $ilmiyLoyiha->tug_sana?->format('Y-m-d'),
                        $ilmiyLoyiha->pan_yunalish,
                        $ilmiyLoyiha->sanasi,
                        $ilmiyLoyiha->sum,
                        $ilmiyLoyiha->olingan_natija,
                        $ilmiyLoyiha->joriy_holati,
                        $ilmiyLoyiha->tijoratlashtirish,
                        $ilmiyLoyiha->is_active,
                        $ilmiyLoyiha->status,
                        $asbobuskuna->id,
                        $asbobuskuna->name,
                        $asbobuskuna->model,
                        $asbobuskuna->turi,
                        $asbobuskuna->ishlab_davlat,
                        $asbobuskuna->ishlabchiq_yil,
                        $asbobuskuna->harid_summa,
                        $asbobuskuna->buxgalteriya_summa,
                        $asbobuskuna->moliya_manbasi,
                        $asbobuskuna->loy_shifri,
                        $asbobuskuna->sh_raqami,
                        $asbobuskuna->sh_sanasi?->format('Y-m-d'),
                        $asbobuskuna->harid_qilingan_yil,
                        $asbobuskuna->holati,
                        $asbobuskuna->urnatilgan_yili,
                        $asbobuskuna->laboratory?->name ?? $asbobuskuna->kafedralar?->name,
                        $asbobuskuna->fish,
                        $asbobuskuna->jav_buy_raqami,
                        $asbobuskuna->jav_sanasi?->format('Y-m-d'),
                        $asbobuskuna->ilmiy_tadqiqot_ishilari,
                        $asbobuskuna->ilmiy_tadqiqot_hajmi,
                        $asbobuskuna->lab_zaxirasi,
                        $asbobuskuna->foy_uchun_ariz,
                        $asbobuskuna->asbob_usk_ehtiyoji,
                        $asbobuskuna->zarur_ehtiyoji,
                        $asbobuskuna->asos,
                        $asbobuskuna->invertar_r,
                        $asbobuskuna->soni,
                        $asbobuskuna->is_active,
                        $asbobuskuna->pivot?->created_at?->format('Y-m-d H:i:s'),
                    ];
                });
            })
            ->values();
    }

    public function headings(): array
    {
        return [
            'Loyiha ID',
            'Tashkilot ID',
            'Tashkilot nomi',
            'Tashkilot turi',
            'Tashkilot STIR',
            'Viloyat',
            'Loyiha mavzusi',
            'Loyiha turi',
            'Loyiha rahbarining F.I.Sh',
            'Loyiha raqami',
            'Loyiha dasturi',
            'Qo‘shma loyiha bo‘yicha hamkor tashkilot',
            'Xalqaro qo‘shma loyihalardagi hamkor davlat',
            'Loyihani amalga oshirish muddati (yil)',
            'Loyihaning boshlanish sanasi',
            'Loyihaning yakunlanish sanasi',
            'Fan yo‘nalish',
            'Sanasi',
            'Summasi (ming so‘mda)',
            'Olingan asosiy natija',
            'Joriy etish (Tatbiq etish) holati',
            'Tijoratlashtirish holati',
            'Loyiha faol',
            'Loyiha status',
            'Asbob-uskuna ID',
            'Asbob-uskuna nomi',
            'Model',
            'Turi',
            'Ishlab chiqilgan davlat',
            'Ishlab chiqilgan yili',
            'Harid qilingan summasi',
            'Buxgalteriya qoldiq summasi',
            'Moliyalashtirish manbasi',
            'Loyiha shifri',
            'Shartnoma raqami',
            'Shartnoma sanasi',
            'Harid qilingan yili',
            'Holati',
            'O‘rnatilgan yili',
            'Laboratoriya / kafedra',
            'Mas’ul F.I.Sh',
            'Javobgar buyruq raqami',
            'Javobgar buyruq sanasi',
            'Bajarilayotgan ilmiy-tadqiqot ishlari',
            'Ilmiy-tadqiqot ish hajmi',
            'Laboratoriya reagent zaxirasi',
            'Foydalanish uchun arizalar',
            'Qo‘shimcha asbob-uskunalarga ehtiyoji',
            'Zarur sarflash materiallari ehtiyoji',
            'Asos',
            'Invertar raqami',
            'Soni',
            'Asbob-uskuna faol',
            'Biriktirilgan sana',
        ];
    }
}
