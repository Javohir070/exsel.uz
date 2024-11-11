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
            'fish' => $row[0],
            'jshshir'=> $row[1],
            'pasport_seriya'=> $row[1],
            'jinsi'=> $row[1],
            'talim_turi'=> $row[1],
            'ixtisoslik'=> $row[1],
            'qabul_qilgan_yil'=> $row[1],
            'mavzusi'=> $row[1],
            'phone'=> $row[1],
            'loyihada_ishtiroki'=> $row[1],
        ]);
    }
}
