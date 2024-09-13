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
            'tashkilot_id' => $row[0],
            'user_id' => auth()->id(),
            'fish' => $row[1],
            'jshshir' => $row[2],
            'yil' => $row[3],
            'jinsi' => $row[4],
            'ish_tartibi' => $row[5],
            'shtat_birligi' => $row[6],
            'urindoshlik_asasida' => $row[7],
            'pedagoglik' => $row[8],
            'lavozimi' => $row[9],
            'malumoti' => $row[10],
            'uzbek_panlar_azosi' => $row[11],
            'ilmiy_daraja' => $row[12],
            'ilmiy_daraja_yil' => $row[13],
            'ilmiy_unvoni' => $row[14],
            'ilmiy_unvoni_y' => $row[15],
            'ixtisosligi' => $row[16],
            'phone' => $row[17],
            'email' => $row[18],
        ]);
    }
}
