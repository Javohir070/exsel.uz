<?php

namespace App\Imports;

use App\Models\Xodimlar;
use Maatwebsite\Excel\Concerns\ToModel;

class XodimlarImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Xodimlar([
            'tashkilot_id'=>auth()->user()->tashkilot_id,
            'user_id'=>auth()->id(),
            'fish' => $row[0],
            'seriya_nomer' => $row[1],
            'jshshir' => $row[2],
            'lavozimi' => $row[3],
            'nskz_kodi' => $row[4],
            'shtat_birligi' => $row[5],
            'staj' => $row[6],
            'malumoti' => $row[7],
            'mehnat_shartn_sana' => $row[8],
            'mehnat_shartn_raqami' => $row[9],
            'qabulq_buyurt_sanasi' => $row[10],
            'qabulq_buyurt_raqami' => $row[11],
            'shartnoma_turi' => $row[12],
            'jinsi' => $row[13],
        ]);
    }
}
