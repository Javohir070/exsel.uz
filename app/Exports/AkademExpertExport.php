<?php

namespace App\Exports;

use App\Models\AkademExpert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AkademExpertExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return AkademExpert::with('akadem')->get()->map(function ($akademExpert) {
            return [
                "id" => $akademExpert->id,
                "Yuboruvchi tashkilot" => $akademExpert->akadem->sender_organization_name,
                "Fish" => $akademExpert->akadem->full_name,

                "Gʻolib yosh olim faoliyat yuritayotgan tashkilotlarning ilm-fan va innovatsiyaga masʼul boʻlgan rahbar oʻrinbosari tomonidan kalendar ish rejasining bajarilishini monitoring qilib borilganligi" => $akademExpert->kalendar_reja_monitoring,
                "Loyiha bajarilishi yakunlanganidan soʻng qabul qiluvchi tashkilot va gʻolib yosh olim oʻrtasida loyihani amalga oshirish xarajatlari koʻrsatilgan holda bajarilgan ishlar boʻyicha dalolatnoma tuzilganligi" =>  $akademExpert->dalolatnoma_tuzilgan,
                "“Akademik harakatchanlik” dasturi doirasida olib borilgan loyiha natijalari hisoboti faoliyat yuritayotgan muassasa rahbari tomonidan tasdiqlangan holda ilmiy, ilmiy-texnik kengashda muhokama qilingani" => $akademExpert->hisobot_muhokama_qilingan,
                'Gʻolib yosh olim yigʻilish bayonnoma koʻchirmasi, ajratilgan mablagʻlarning sarflanganligi boʻyicha hisobotni Agentlikka taqdim etganligi' => $akademExpert->hisobot_agentlikka_taqdim,

                "Ekspert xulosasi" => $akademExpert->status,
                "Izoh" => $akademExpert->comment,
                "Ishchi guruh rahbari F.I.Sh" => $akademExpert->fish,
                "Ishchi guruh azosi F.I.Sh" => $akademExpert->user->name,
                "Ekspert F.I.Sh" => $akademExpert->ekspert_fish,
                "Tashkilotning mas'ul rahbari  F.I.Sh" => $akademExpert->t_masul
            ];
        });
    }

    public function headings(): array
    {
        return [
            "ID",
            "Yuboruvchi tashkilot",
            "F.I.SH.",

            "Gʻolib yosh olim faoliyat yuritayotgan tashkilotlarning ilm-fan va innovatsiyaga masʼul boʻlgan rahbar oʻrinbosari tomonidan kalendar ish rejasining bajarilishini monitoring qilib borilganligi",
            "Loyiha bajarilishi yakunlanganidan soʻng qabul qiluvchi tashkilot va gʻolib yosh olim oʻrtasida loyihani amalga oshirish xarajatlari koʻrsatilgan holda bajarilgan ishlar boʻyicha dalolatnoma tuzilganligi",
            "“Akademik harakatchanlik” dasturi doirasida olib borilgan loyiha natijalari hisoboti faoliyat yuritayotgan muassasa rahbari tomonidan tasdiqlangan holda ilmiy, ilmiy-texnik kengashda muhokama qilingani",
            'Gʻolib yosh olim yigʻilish bayonnoma koʻchirmasi, ajratilgan mablagʻlarning sarflanganligi boʻyicha hisobotni Agentlikka taqdim etganligi',

            "Ekspert xulosasi",
            "Izoh",
            "Ishchi guruh rahbari F.I.Sh",
            "Ishchi guruh azosi F.I.Sh",
            "Ekspert F.I.Sh",
            "Tashkilotning mas'ul rahbari  F.I.Sh",
        ];
    }
}
