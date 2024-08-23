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
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'user_id' => auth()->id(),
            'jshshir' => $row[0],
            'fish' => $row[1],
            'yil' => $row[2],
            'jinsi' => $row[3],
            'ish_tartibi' => $row[4],
            'shtat_birligi' => $row[5],
            'urindoshlik_asasida' => $row[6],
            'pedagoglik' => $row[7],
            'lavozimi' => $row[8],
            'malumoti' => $row[9],
            'uzbek_panlar_azosi' => $row[10],
            'ilmiy_daraja' => $row[11],
            'ilmiy_daraja_yil' => $row[12],
            'ilmiy_unvoni' => $row[13],
            'ilmiy_unvoni_y' => $row[14],
            'ixtisosligi' => $row[15],
            'phone' => $row[16],
            'email' => $row[17],
        ]);
    }
}
