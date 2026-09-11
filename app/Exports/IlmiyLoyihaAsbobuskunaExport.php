<?php

namespace App\Exports;

use Generator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IlmiyLoyihaAsbobuskunaExport implements FromGenerator, WithHeadings
{
    public function generator(): Generator
    {
        foreach ($this->buildQuery()->cursor() as $row) {
            yield $this->mapRow($row);
        }
    }

    private function buildQuery(): Builder
    {
        $query = DB::table('ilmiy_loyiha_asbobuskuna as pivot')
            ->join('ilmiy_loyihas as l', 'pivot.ilmiy_loyiha_id', '=', 'l.id')
            ->join('asbobuskunas as a', 'pivot.asbobuskuna_id', '=', 'a.id')
            ->leftJoin('tashkilots as t', 'l.tashkilot_id', '=', 't.id')
            ->leftJoin('laboratories as lab', 'a.laboratory_id', '=', 'lab.id')
            ->orderBy('l.id')
            ->orderBy('a.id');

        if (Schema::hasTable('regions')) {
            $query->leftJoin('regions as r', 't.region_id', '=', 'r.id');
        }

        if (Schema::hasTable('kafedralars')) {
            $query->leftJoin('kafedralars as k', 'a.kafedralar_id', '=', 'k.id');
        }

        return $query->select($this->selectColumns());
    }

    private function selectColumns(): array
    {
        $columns = [
            'l.id as loyiha_id',
            't.id as tashkilot_id',
            't.name as tashkilot_name',
            't.tashkilot_turi',
            't.stir_raqami',
            Schema::hasTable('regions') ? 'r.oz as viloyat' : DB::raw('NULL as viloyat'),
            'l.mavzusi',
            'l.turi as loyiha_turi',
            'l.rahbar_name',
            'l.raqami',
            'l.dastyri',
            'l.q_hamkor_tashkilot',
            'l.hamkor_davlat',
            'l.muddat',
            'l.bosh_sana',
            'l.tug_sana',
            'l.pan_yunalish',
            'l.sanasi',
            'l.sum',
            'l.olingan_natija',
            'l.joriy_holati',
            'l.tijoratlashtirish',
            'l.is_active as loyiha_is_active',
            'l.status as loyiha_status',
            'a.id as asbobuskuna_id',
            'a.name as asbobuskuna_name',
            'a.model',
            'a.turi as asbobuskuna_turi',
            'a.ishlab_davlat',
            'a.ishlabchiq_yil',
            'a.harid_summa',
            'a.buxgalteriya_summa',
            'a.moliya_manbasi',
            'a.loy_shifri',
            'a.sh_raqami',
            'a.sh_sanasi',
            'a.harid_qilingan_yil',
            'a.holati',
            'a.urnatilgan_yili',
            'lab.name as laboratory_name',
            Schema::hasTable('kafedralars') ? 'k.name as kafedra_name' : DB::raw('NULL as kafedra_name'),
            'a.fish',
            'a.jav_buy_raqami',
            'a.jav_sanasi',
            'a.ilmiy_tadqiqot_ishilari',
            'a.ilmiy_tadqiqot_hajmi',
            'a.lab_zaxirasi',
            'a.foy_uchun_ariz',
            'a.asbob_usk_ehtiyoji',
            'a.zarur_ehtiyoji',
            'a.asos',
            'a.invertar_r',
            'a.soni',
            'a.is_active as asbobuskuna_is_active',
            'pivot.created_at as biriktirilgan_sana',
        ];

        return $columns;
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

    private function mapRow(object $row): array
    {
        return [
            $row->loyiha_id,
            $row->tashkilot_id,
            $row->tashkilot_name,
            match ($row->tashkilot_turi) {
                'otm' => 'OTM',
                'itm' => 'ITM',
                default => $row->tashkilot_turi ?? 'boshqa',
            },
            $row->stir_raqami,
            $row->viloyat,
            $row->mavzusi,
            $row->loyiha_turi,
            $row->rahbar_name,
            $row->raqami,
            $row->dastyri,
            $row->q_hamkor_tashkilot,
            $row->hamkor_davlat,
            $row->muddat,
            $this->formatDate($row->bosh_sana),
            $this->formatDate($row->tug_sana),
            $row->pan_yunalish,
            $row->sanasi,
            $row->sum,
            $row->olingan_natija,
            $row->joriy_holati,
            $row->tijoratlashtirish,
            $row->loyiha_is_active,
            $row->loyiha_status,
            $row->asbobuskuna_id,
            $row->asbobuskuna_name,
            $row->model,
            $row->asbobuskuna_turi,
            $row->ishlab_davlat,
            $row->ishlabchiq_yil,
            $row->harid_summa,
            $row->buxgalteriya_summa,
            $row->moliya_manbasi,
            $row->loy_shifri,
            $row->sh_raqami,
            $this->formatDate($row->sh_sanasi),
            $row->harid_qilingan_yil,
            $row->holati,
            $row->urnatilgan_yili,
            $row->laboratory_name ?? $row->kafedra_name,
            $row->fish,
            $row->jav_buy_raqami,
            $this->formatDate($row->jav_sanasi),
            $row->ilmiy_tadqiqot_ishilari,
            $row->ilmiy_tadqiqot_hajmi,
            $row->lab_zaxirasi,
            $row->foy_uchun_ariz,
            $row->asbob_usk_ehtiyoji,
            $row->zarur_ehtiyoji,
            $row->asos,
            $row->invertar_r,
            $row->soni,
            $row->asbobuskuna_is_active,
            $this->formatDateTime($row->biriktirilgan_sana),
        ];
    }

    private function formatDate(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return substr((string) $value, 0, 10);
    }

    private function formatDateTime(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }
}
