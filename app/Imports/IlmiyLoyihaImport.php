<?php

namespace App\Imports;

use App\Models\IlmiyLoyiha;
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
        return new IlmiyLoyiha([
            'user_id' => auth()->id(),
            'tashkilot_id' => $row[1],
            'turi' => $row[2],
            'dastyri' => $row[3],
            'bosh_sana' =>$this->transformDate($row[4]),
            'tug_sana' =>$this->transformDate($row[5]),
            'raqami' => $row[6],
            'mavzusi' => $row[7],
            'rahbar_name' => $row[8],
            'sum' => $row[9],
            'pan_yunalish' => $row[10],
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
        return 2;
    }
}
