<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;
use App\Models\IlmiyLoyiha;

class IlmiyLoyihaImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    public function model(array $row)
    {
        $ilmiyloyiha = IlmiyLoyiha::find($row[0]);

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
        if (empty($value)) return null;

        try {
            if (preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $value)) {
                return Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d');
            }
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            \Log::warning("Sanani parse qilishda xatolik: $value");
            return null;
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}

