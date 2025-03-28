<?php

namespace App\Imports;

use App\Models\Asbobuskuna;
use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\ToModel;

class AsbobuskunaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tashkilot = Tashkilot::where('stir_raqami', '=' ,$row[1])->first();
        return new Asbobuskuna([
            'tashkilot_id' => $tashkilot->id,
            'user_id' => auth()->user()->id,
            'name' => $row[0],
            'is_active' => 1,
        ]);
    }
}
