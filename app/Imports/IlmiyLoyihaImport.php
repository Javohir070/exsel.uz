<?php

namespace App\Imports;

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
        $ilmiyloyiha = IlmiyLoyiha::findOrFail($row[0]);

        if ($ilmiyloyiha) {
            $ilmiyloyiha->rahbar_name = $row[1];
            $ilmiyloyiha->raqami = $row[2];
            $ilmiyloyiha->bosh_sana = $this->parseDate($row[3]);
            $ilmiyloyiha->tug_sana = $this->parseDate($row[4]);
            $ilmiyloyiha->save();
        }

        return null;
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

