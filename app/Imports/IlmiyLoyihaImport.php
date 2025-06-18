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
        $ilmiyloyiha = IlmiyLoyiha::find($row[0]);

        if ($ilmiyloyiha) {
            $ilmiyloyiha->rahbar_name = $row[1];
            $ilmiyloyiha->raqami = $row[2];
            $ilmiyloyiha->bosh_sana = $row[3];
            $ilmiyloyiha->tug_sana = $row[4];
            $ilmiyloyiha->save(); // modelni o'zi saqlanadi
            return $ilmiyloyiha;
        }

        return null; // agar id topilmasa
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
