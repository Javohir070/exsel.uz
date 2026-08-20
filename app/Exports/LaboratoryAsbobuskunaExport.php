<?php

namespace App\Exports;

use App\Models\Asbobuskuna;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaboratoryAsbobuskunaExport implements FromQuery, WithHeadings, WithMapping
{
    public function __construct(
        private readonly ?int $laboratoryId = null,
    ) {
    }

    public function query(): Builder
    {
        return Asbobuskuna::query()
            ->select([
                'id', 'tashkilot_id', 'laboratory_id', 'name', 'model', 'turi',
                'ishlab_davlat', 'ishlabchiq_yil', 'harid_summa', 'buxgalteriya_summa',
                'moliya_manbasi', 'harid_qilingan_yil', 'holati', 'soni', 'fish', 'invertar_r',
            ])
            ->with(['laboratory:id,name', 'tashkilot:id,name'])
            ->when($this->laboratoryId, fn ($query) => $query->where('laboratory_id', $this->laboratoryId))
            ->orderBy('laboratory_id')
            ->orderBy('name');
    }

    public function headings(): array
    {
        return [
            'Tashkilot',
            'Laboratoriya',
            'Uskuna nomi',
            'Modeli',
            'Turi',
            'Ishlab chiqarilgan davlat',
            'Ishlab chiqarilgan yil',
            'Xarid qilingan summa',
            'Buxgalteriya qoldiq summasi',
            'Moliyalashtirish manbasi',
            'Xarid qilingan yil',
            'Holati',
            'Soni',
            'Mas’ul shaxs',
            'Inventar raqami',
        ];
    }

    public function map($asbobuskuna): array
    {
        return [
            $asbobuskuna->tashkilot?->name,
            $asbobuskuna->laboratory?->name,
            $asbobuskuna->name,
            $asbobuskuna->model,
            $asbobuskuna->turi,
            $asbobuskuna->ishlab_davlat,
            $asbobuskuna->ishlabchiq_yil,
            $asbobuskuna->harid_summa,
            $asbobuskuna->buxgalteriya_summa,
            $asbobuskuna->moliya_manbasi,
            $asbobuskuna->harid_qilingan_yil,
            $asbobuskuna->holati,
            $asbobuskuna->soni,
            $asbobuskuna->fish,
            $asbobuskuna->invertar_r,
        ];
    }
}
