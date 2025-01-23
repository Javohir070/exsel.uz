<?php

namespace App\Exports;

use App\Models\Laboratory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class LaboratoryExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Laboratory::with('izlanuvchilar', 'ilmiyLoyihalar', 'xujaliklar', 'tashkilot')->get();
    }

    public function headings(): array
    {
        return [
            'Tashkilot nomi',
            'Labaratoriyaning nomi',
            'Tashkil etilgan yil',
            'Ilmiy loyhilar soni',
            'Xo\'jalik shartnomalari soni',
            'Ilmiy izlauvchilar nafar',
            'Doktorantura, DSc nafar',
            'Mustaqil tadqiqotchi, DSc nafar',
            'Maqsadli doktorantura, DSc nafar',
            'Tayanch doktorantura, PhD nafar',
            'Mustaqil tadqiqotchi, PhD nafar',
            'Maqsadli tayanch doktorantura, PhD nafar',
            'Stajyor-tadqiqotchi nafar',
            'Tavsif',
            'Tugash sanasi',
            'OTM/ITM'
        ];
    }

    public function map($laboratory): array
    {
        // Har bir ta'lim turi bo'yicha tadqiqotchilarni sanash
        $izlanuvchilar = $laboratory->izlanuvchilar->groupBy('talim_turi');
        $ilmiyLoyihalar_soni = $laboratory->ilmiyLoyihalar->count();
        $xujaliklar_soni = $laboratory->xujaliklar->count();
        $izlanuvchilar_soni = $laboratory->izlanuvchilar->count();
        $dsc_count = $izlanuvchilar->get('Doktorantura, DSc', collect())->count();
        $dsc_mus_count = $izlanuvchilar->get('Mustaqil tadqiqotchi, DSc', collect())->count();
        $dsc_maq_count = $izlanuvchilar->get('Maqsadli doktorantura, DSc', collect())->count();
        $phd_count = $izlanuvchilar->get('Tayanch doktorantura, PhD', collect())->count();
        $phd_mus_count = $izlanuvchilar->get('Mustaqil tadqiqotchi, PhD', collect())->count();
        $phd_maq_count = $izlanuvchilar->get('Maqsadli tayanch doktorantura, PhD', collect())->count();
        $intern_count = $izlanuvchilar->get('Stajyor-tadqiqotchi', collect())->count();
        $ilmiyLoyihalarMavzusi = $laboratory->ilmiyLoyihalar->pluck('mavzusi')->implode(', ');
        $tugash_sana = $laboratory->ilmiyLoyihalar->pluck('tug_sana')->implode(', ');
        $son_loyihalar = $laboratory->ilmiyLoyihalar->count();
        // $itm = $laboratory->tashkilot->tashkilot_turi ?? "otm",
        return [
            $laboratory->tashkilot->name,
            $laboratory->name,
            $laboratory->tash_yil,
            $ilmiyLoyihalar_soni,
            $xujaliklar_soni,
            $izlanuvchilar_soni,
            $dsc_count,
            $dsc_mus_count,
            $dsc_maq_count,
            $phd_count,
            $phd_mus_count,
            $phd_maq_count,
            $intern_count,
            $laboratory->tavsif,
            $tugash_sana,
            $laboratory->tashkilot->tashkilot_turi ?? "otm"
        ];
    }
}
