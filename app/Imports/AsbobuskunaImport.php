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
        $tashkilot = Tashkilot::where('stir_raqami', '=', $row[4])->first();
        return new Asbobuskuna([
            'tashkilot_id' => $row[4],
            'user_id' => auth()->user()->id,
            'name' => $row[0],
            'soni' => $row[1],
            'harid_summa' => $row[2],
            'asos' => $row[3],
            'is_active' => 1,
        ]);
    }
}
