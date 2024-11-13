<?php

namespace App\Imports;

use App\Models\Izlanuvchilar;
use Maatwebsite\Excel\Concerns\ToModel;

class IzlanuvchilarImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Izlanuvchilar([
            'user_id' => auth()->id(),
            'tashkilot_id' => $row[0],
            'fish' => $row[1],
            'talim_turi'=> $row[2],
            'jshshir'=> $row[3],
            'pasport_seriya'=> $row[4],
            'jinsi'=> $row[5],
            'phone'=> $row[6],
            'mavzusi'=> $row[7],
            'qabul_qilgan_yil'=> 2000,
            'ixtisoslik' => 'yoq',
            'loyihada_ishtiroki'=> 'yoq',
        ]);
    }
}
