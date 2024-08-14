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
               "Ishlanma (mahsulot, tovar, xizmat va ishlar) nomi" => $xujaliklar->ishlanma_nomi,
               "Intellektual mulk huquqining mavjudligi (mavjud bo‘lsa: raqami)" => $xujaliklar->intellektual_raqami,
               "Intellektual mulk huquqining mavjudligi (mavjud bo‘lsa: sanasi)" => $xujaliklar->intellektual_sana,
               "Ishlanma yaratilgan tadqiqot mavzusi" => $xujaliklar->ishlanma_mavzu,
               "Ishlanma yaratilgan tadqiqot turi" => $xujaliklar->ishlanma_turi,
               "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) xo‘jalik yoki litsenzion" => $xujaliklar->lisenzion,
               "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) raqami" => $xujaliklar->sh_raqami,
               "shartnoma turi (xo‘jalik shartnomasi, litsenziya shartnomasi) sanasi" => $xujaliklar->sh_sanasi,
               "Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona nomi" => $xujaliklar->ilmiy_nomi,
               "Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona STIR " => $xujaliklar->stir,
               "shartnoma summasi (mln.so‘m)" => $xujaliklar->sh_summa,
               "Shartnoma bo‘yicha kelib tushgan mablag‘ sanasi" => $xujaliklar->shkelib_sana,
               "Shartnoma bo‘yicha kelib tushgan mablag‘ summasi" => $xujaliklar->shkelib_summa,
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
