<?php

namespace App\Exports;

use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TashkilotExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tashkilot::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID raqami',
            'Tashkilot nomi',
            'Tashkil etilgan yili',
            'Yuridik manzili',
            'Viloyat',
            'Tuman',
            'Faoliyat yuritayotgan mazili',
            'Telefon raqami',
            'Email',
            'Tashkilot veb-sayti',
            'Mulkchilik turi (davlat, xususiy)',
            'Tashkilotni saqlash harajatlarini moliyalashtirish manbaasi (davlat budjeti, xususiy investitsiyalar va boshqalar)',
            'Shtat birligi soni',
            'Xodimlar soni',
            'Ilmiy xodimlar soni',
            'Boshqaruv tuzilmas',
            'STIR raqami',
            'Tashkilot hisob raqami',
            'Xizmat ko‘rsatuvchi bank'
        ];
    }

    public function map($tashkilot): array
    {
        return [
            $tashkilot->id,
            $tashkilot->id_raqam,
            $tashkilot->name,
            $tashkilot->tash_yil,
            $tashkilot->yur_manzil,
            $tashkilot->viloyat,
            $tashkilot->tuman,
            $tashkilot->paoliyat_manzil,
            $tashkilot->phone,
            $tashkilot->email,
            $tashkilot->web_sayti,
            $tashkilot->turi,
            $tashkilot->xarajatlar,
            $tashkilot->shtat_bir,
            $tashkilot->tash_xodimlar,
            $tashkilot->ilmiy_xodimlar,
            $tashkilot->boshqariv,
            $tashkilot->stir_raqami,
            $tashkilot->hisob_raqam,
            $tashkilot->bank,
        ];
    }
}
