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

        return Tekshirivchilar::with('ilmiyLoyihalar.tashkilot')->get()->map(function ($tekshirivchilar) {
            return [
                'id' => $tekshirivchilar->id,
                'Tashkilot nomi' => optional($tekshirivchilar->ilmiyLoyihalar->tashkilot)->nomi ?? 'Noma’lum',
                'Loyiha mavzusi' => optional($tekshirivchilar->ilmiyLoyihalar)->mavzusi ?? 'Noma’lum',
                'Loyiha turi' => optional($tekshirivchilar->ilmiyLoyihalar)->turi ?? 'Noma’lum',
                'Loyiha dasturi' => optional($tekshirivchilar->ilmiyLoyihalar)->dastyri ?? 'Noma’lum',
                'Qo‘shma loyiha bo‘yicha hamkor tashkilot' => optional($tekshirivchilar->ilmiyLoyihalar)->q_hamkor_tashkilot ?? 'Noma’lum',
                'Xalqaro qo‘shma loyihalardagi hamkor davlat' => optional($tekshirivchilar->ilmiyLoyihalar)->hamkor_davlat ?? 'Noma’lum',
                'Loyihani amalga oshirish muddati (yil)' => optional($tekshirivchilar->ilmiyLoyihalar)->muddat ?? 'Noma’lum',
                'Loyihaning boshlanish sanasi' => optional($tekshirivchilar->ilmiyLoyihalar)->bosh_sana ?? 'Noma’lum',
                'Loyihaning yakunlanish sanasi' => optional($tekshirivchilar->ilmiyLoyihalar)->tug_sana ?? 'Noma’lum',
                'Fan yo‘nalish' => optional($tekshirivchilar->ilmiyLoyihalar)->pan_yunalish ?? 'Noma’lum',
                'Loyiha rahbarining F.I.Sh' => optional($tekshirivchilar->ilmiyLoyihalar)->rahbar_name ?? 'Noma’lum',
                'Raqami' => optional($tekshirivchilar->ilmiyLoyihalar)->raqami ?? 'Noma’lum',
            ];
        });


    }
}
