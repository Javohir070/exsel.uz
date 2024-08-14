<?php

namespace App\Exports;

use App\Models\Xujalik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class XujalikExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Xujalik::with('tashkilot')->get()->map(function ($xujaliklar){
            return [
               "id" => $xujaliklar->id,
               "Tashkilot" => $xujaliklar->tashkilot->name,
               "Ishlanma (mahsulot, tovar, xizmat va ishlar) nomi" => $xujaliklar->fish,
               "Intellektual mulk huquqining mavjudligi (mavjud bo‘lsa: raqami)" => $xujaliklar->fish,
               "Intellektual mulk huquqining mavjudligi (mavjud bo‘lsa: sanasi)" => $xujaliklar->fish,
               "Ishlanma yaratilgan tadqiqot mavzusi" => $xujaliklar->fish,
               "Ishlanma yaratilgan tadqiqot turi" => $xujaliklar->fish,
               "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) xo‘jalik yoki litsenzion" => $xujaliklar->fish,
               "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) raqami" => $xujaliklar->fish,
               "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) sanasi" => $xujaliklar->fish,
               "Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona nomi" => $xujaliklar->fish,
               "Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona STIR " => $xujaliklar->fish,
               "shartnoma summasi (mln.so‘m)" => $xujaliklar->fish,
               "Shartnoma bo‘yicha kelib tushgan mablag‘ sanasi" => $xujaliklar->fish,
               "Shartnoma bo‘yicha kelib tushgan mablag‘ summasi" => $xujaliklar->fish,
            ];
        });
    }

    public function headings(): array
    {
        return [
            "ID",
            "Tashkilot",
            "Ishlanma (mahsulot, tovar, xizmat va ishlar) nomi",
            "Intellektual mulk huquqining mavjudligi (mavjud bo‘lsa: raqami)",
            "Intellektual mulk huquqining mavjudligi (mavjud bo‘lsa: sanasi)",
            "Ishlanma yaratilgan tadqiqot mavzusi",
            "Ishlanma yaratilgan tadqiqot turi",
            "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) xo‘jalik yoki litsenzion",
            "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) raqami",
            "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) sanasi",
            "Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona nomi",
            "Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona STIR ",
            "shartnoma summasi (mln.so‘m)",
            "Shartnoma bo‘yicha kelib tushgan mablag‘ sanasi",
            "Shartnoma bo‘yicha kelib tushgan mablag‘ summasi",
        ];
    }
}
