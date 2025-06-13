<?php

namespace App\Exports;

use App\Models\Doktaranturaexpert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DoktaranturaexpertExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Doktaranturaexpert::with('tashkilot')->get()->map(function($doktaranturaexpert){
            return [
                'id' => $doktaranturaexpert->id,
                "Tashkilot nomi" => $doktaranturaexpert->tashkilot->name,
                "Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni." => $doktaranturaexpert->umumiy_izlanuvchilar,
                "Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni." => $doktaranturaexpert->yagonae_tah_soni,
                "Chetlashtirilgan izlanuvchilar soni." => $doktaranturaexpert->chetlash_soni,
                "Akademik ta’tildagi izlanuvchilar soni." => $doktaranturaexpert->akademik_soni,
                "Muddatidan oldin himoya qilgan izlanuvchilar soni." => $doktaranturaexpert->muddatidano_soni,
                "Yagona elektron tizimga kiritilmagan izlanuvchilar soni"=>$doktaranturaexpert->kiritilmagan_soni ,
                "Yakka tartibdagi rejani bajarmagan izlanuvchilar soni "=>$doktaranturaexpert->rejani_bajarmagan ,
                "Monitoring natijasi kiritilmagan izlanuvchilar soni "=>$doktaranturaexpert->mon_nat_kiritilmagan ,
                "Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni "=>$doktaranturaexpert->biriktirilgan_rahbarlar ,
                "Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud bo'lmagan ilmiy rahbarlar soni "=>$doktaranturaexpert->kollegial_rahbarlar ,
                "Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni "=>$doktaranturaexpert->meyoridan_rahbarlar ,
                "Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni "=>$doktaranturaexpert->tash_ortiq_rahbarlar ,
                "Ekspert xulosasi"=>$doktaranturaexpert->status ,
                "Izoh"=>$doktaranturaexpert->comment,
                "Ishchi guruh rahbari F.I.Sh"=>$doktaranturaexpert->fish,
                "Ishchi guruh azosi F.I.Sh" => $doktaranturaexpert->user->name,
                "Ekspert F.I.Sh"=>$doktaranturaexpert->ekspert_fish,
                "Tashkilotning mas'ul rahbari  F.I.Sh"=>$doktaranturaexpert->t_masul
            ];
        });
    }


    public function headings(): array
      {
          return [
                'id',
                "Tashkilot nomi",
                "Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni.",
                "Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.",
                "Chetlashtirilgan izlanuvchilar soni.",
                "Akademik ta’tildagi izlanuvchilar soni.",
                "Muddatidan oldin himoya qilgan izlanuvchilar soni.",
                "Yagona elektron tizimga kiritilmagan izlanuvchilar soni",
                "Yakka tartibdagi rejani bajarmagan izlanuvchilar soni ",
                "Monitoring natijasi kiritilmagan izlanuvchilar soni ",
                "Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni ",
                "Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud bo'lmagan ilmiy rahbarlar soni ",
                "Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni ",
                "Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni ",
                "Ekspert xulosasi",
                "Izoh",
                "Ishchi guruh rahbari F.I.Sh",
                "Ishchi guruh azosi F.I.Sh" ,
                "Ekspert F.I.Sh",
                "Tashkilotning mas'ul rahbari  F.I.Sh",
          ];
      }
}
