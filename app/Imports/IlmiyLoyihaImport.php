<?php

namespace App\Imports;

use App\Models\IlmiyLoyiha;
use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;
class IlmiyLoyihaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tashkilot = Tashkilot::where('stir_raqami', '=' ,$row[3])->first();
        return new IlmiyLoyiha([
            'user_id' => auth()->id(),
            'tashkilot_id' => $tashkilot->id,
            'turi' => $row[0],
            'raqami' => $row[4],
            'mavzusi' => $row[1],
            'rahbar_name' => $row[2],
            // 'dastyri' => $row[3],
            // 'bosh_sana' =>$this->transformDate($row[4]),
            // 'tug_sana' =>$this->transformDate($row[5]),
            // 'sum' => $row[9],
            // 'pan_yunalish' => $row[10],
            'is_active' => 1,
        ]);
    }

    private function transformDate($value)
    {
        // 1. Agar sana raqam (Excel timestamp) bo‘lsa, uni sanaga o‘tkazamiz
        if (is_numeric($value)) {
            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format('Y-m-d');
        }

        // 2. Agar sana `DD.MM.YYYY` formatda bo‘lsa, uni `YYYY-MM-DD` formatga o‘tkazamiz
        if (preg_match('/\d{2}\.\d{2}\.\d{4}/', $value)) {
            return Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d');
        }

        // 3. Agar allaqachon `YYYY-MM-DD` formatda bo‘lsa, hech narsa o‘zgartirmaymiz
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function startRow(): int
    {
        return 0;
    }
}
