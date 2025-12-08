<?php

namespace App\Imports;

use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use App\Models\IlmiyLoyiha;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IlmiyLoyihaImport implements ToModel
{



    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tashkilot = Tashkilot::where('stir_raqami', '=', $row[1])->first();
        return new IlmiyLoyiha([
            'user_id' => auth()->user()->id,
            'tashkilot_id' => $tashkilot->id,
            'turi' => $row[2],
            'tug_sana' => $this->parseDate($row[3]),
            'raqami' => $row[4],
            'mavzusi' => $row[5],
            'rahbar_name' => $row[6],
            'is_active' => 1,
            // 'bosh_sana' => $this->parseDate($row[2]),
            // 'sum' => $row[7],
        ]);
    }


    private function parseDate($value)
    {
        if (empty($value))
            return null;

        try {
            if (is_numeric($value)) {
                // Exceldagi raqam sifatidagi sanani aniqlash
                return Date::excelToDateTimeObject($value)->format('Y-m-d');
            }

            if (preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $value)) {
                return Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d');
            }

            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            \Log::warning("Sanani parse qilishda xatolik: $value. Xato: " . $e->getMessage());
            return null;
        }
    }

}

