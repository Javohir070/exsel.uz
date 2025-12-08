<?php

namespace App\Imports;

use App\Models\Tijorat;
use Maatwebsite\Excel\Concerns\ToModel;

class TijoratImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tijorat([
            'user_id' => 1,
            'tashkilot_id' => 1,
            'region_id' => 12,
            'name' => $row[0],
            'loyiha_rahbari' => $row[1],
            'ijrochi_tashkilot' => $row[2],
            'summa' => $row[3],
            'tash_summasi' => $row[4],
            'region' => $row[5],
            'turi' => $row[6],
            'yar_ish_urni' => $row[7],
            't_soha' => $row[8],
            'q_soha' => $row[9],
            'm_asosi' => $row[10],
        ]);
    }
}
