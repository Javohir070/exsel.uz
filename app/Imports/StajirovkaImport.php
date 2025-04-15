<?php

namespace App\Imports;

use App\Models\Stajirovka;
use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\ToModel;

class StajirovkaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tashkilot = Tashkilot::where('stir_raqami', '=' ,$row[3])->first();
        return new Stajirovka([
            'yil' => $row[0],
            'tashkilot_id' => $tashkilot->id,
            'user_id' => auth()->user()->id,
            'fish' => $row[1],
            'lavozim' => $row[2] ?? null,
            'yunalishi' => $row[4] ?? null,
            'holati' => $row[5] ?? null,
        ]);
    }
}


