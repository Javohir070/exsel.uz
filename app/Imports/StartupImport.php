<?php

namespace App\Imports;

use App\Models\Startup;
use Maatwebsite\Excel\Concerns\ToModel;

class StartupImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Startup([
            'user_id' => 1,
            'tashkilot_id' => 1,
            'region_id' => 12,
            'district_id' => 5,
            'name' => $row[0],
            'loyiha_rahbari' => $row[1],
            'inn' => $row[2],
            'ijrochi_tashkilot' => $row[3],
            'sh_summa' => $row[4],
            'uz_mablaglari_hisobidan' => $row[5],
            'umumiy_qiymati' => $row[6],
            'phone' => $row[7],
            'sh_raqami' => $row[8],
            'sh_sanasi' => $this->excelDateToMysql($row[9]),
            'bajarish_muddati' => $this->excelDateToMysql($row[10]),
            'soha' => $row[11],
            'tuman' => $row[12],
            'yangi_ish_urni' => $row[13],
        ]);
    }

    function excelDateToMysql($value)
    {
        // Excel numeric date bo'lsa
        if (is_numeric($value) && $value > 30000 && $value < 60000) {
            return \Carbon\Carbon::createFromTimestamp(($value - 25569) * 86400)
                ->format('Y-m-d');
        }

        // Oddiy sana bo'lsa (masalan: 2025-01-10)
        if (strtotime($value)) {
            return date('Y-m-d', strtotime($value));
        }

        return null; // noto'g'ri bo'lsa
    }
}
