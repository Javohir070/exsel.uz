<?php

namespace App\Exports;

use App\Models\Tekshirivchilar;
use Maatwebsite\Excel\Concerns\FromCollection;

class TekshirivchilarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Tekshirivchilar::with('ilmiyLoyihalar')->get()->map(function ($tekshirivchilar) {

            return [
                'id' => $tekshirivchilar->id,
                'Loyiha mavzusi' => $tekshirivchilar->ilmiyLoyihalar->mavzusi ?? 'Noma’lum',
                'Loyiha turi' => $tekshirivchilar->ilmiyLoyihalar->turi ?? 'Noma’lum',
                'Loyiha dasturi' => $tekshirivchilar->ilmiyLoyihalar->dastyri ?? 'Noma’lum',
                'Qo‘shma loyiha bo‘yicha hamkor tashkilot' => $tekshirivchilar->ilmiyLoyihalar->q_hamkor_tashkilot ?? 'Noma’lum',
                'Xalqaro qo‘shma loyihalardagi hamkor davlat' => $tekshirivchilar->ilmiyLoyihalar->hamkor_davlat ?? 'Noma’lum',
                'Loyihani amalga oshirish muddati (yil)' => $tekshirivchilar->ilmiyLoyihalar->muddat ?? 'Noma’lum',
                'Loyihaning boshlanish sanasi' => $tekshirivchilar->ilmiyLoyihalar->bosh_sana ?? 'Noma’lum',
                'Loyihaning yakunlanish sanasi' => $tekshirivchilar->ilmiyLoyihalar->tug_sana ?? 'Noma’lum',
                'Fan yo‘nalish' => $tekshirivchilar->ilmiyLoyihalar->pan_yunalish ?? 'Noma’lum',
                'Loyiha rahbarining F.I.Sh' => $tekshirivchilar->ilmiyLoyihalar->rahbar_name ?? 'Noma’lum',
                'Raqami' => $tekshirivchilar->ilmiyLoyihalar->raqami ?? 'Noma’lum',
            ];
        });

    }
}
