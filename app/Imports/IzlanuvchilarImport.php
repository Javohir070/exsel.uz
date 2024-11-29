<?php

namespace App\Imports;

use App\Models\Izlanuvchilar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IzlanuvchilarImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Izlanuvchilar([
            'user_id' => auth()->id(),
            'tashkilot_id' => $row[0],
            'fish' => $row[1],
            'talim_turi' => $row[2],
            'jshshir' => $row[3],
            'pasport_seriya' => $row[4],
            'qabul_qilgan_yil' => $this->formatDatetime($row[5]),
            'jinsi' => $row[6],
            'phone' => $row[7],
            'ixtisoslik' => $row[8],
            'mavzusi' => $row[9],
        ]);
    }

    private function formatDatetime($datetime)
    {
        // Null yoki bo'sh qiymatlar uchun
        if (empty($datetime) || strtolower($datetime) === 'null') {
            return null;
        }

        $formats = [
            'Y-m-d H:i:s.uP', // To'liq fractional seconds va timezone bilan
            'Y-m-d H:i:sP',   // Fractional seconds holda, timezone bilan
            'Y-m-d H:i:s',    // Oddiy datetime
            'Y-m-d',          // Faqat sana
        ];

        foreach ($formats as $format) {
            try {
                // Kiruvchi ma'lumotni to'g'ri formatlash
                return \Carbon\Carbon::createFromFormat($format, $datetime)->format('Y-m-d');
            } catch (\Exception $e) {
                continue; // Format mos kelmasa, keyingisini sinab ko'radi
            }
        }

        // Agar hech qaysi format mos kelmasa, xatolik chiqariladi
        throw new \Exception("Invalid datetime format: {$datetime}");
    }

    public function startRow(): int
    {
        return 2;
    }
}
