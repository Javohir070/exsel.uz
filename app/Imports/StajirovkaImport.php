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


// SELECT temp.stir_raqami 
// FROM (
//       SELECT 200006358 AS stir_raqami UNION ALL
//       SELECT 200006516 UNION ALL
//       SELECT 200055757 UNION ALL
//       SELECT 200055908 UNION ALL
//       SELECT 200056573 UNION ALL
//       SELECT 200131171 UNION ALL
//       SELECT 200258091 UNION ALL
//       SELECT 200322757 UNION ALL
//       SELECT 200343003 UNION ALL
//       SELECT 200357981 UNION ALL
//       SELECT 200473474 UNION ALL
//       SELECT 200522950 UNION ALL
//       SELECT 200540390 UNION ALL
//       SELECT 200540755 UNION ALL
//       SELECT 200540953 UNION ALL
//       SELECT 200541019 UNION ALL
//       SELECT 200541120 UNION ALL
//       SELECT 200541398 UNION ALL
//       SELECT 200570932 UNION ALL
//       SELECT 200580366 UNION ALL
//       SELECT 200588204 UNION ALL
//       SELECT 200607044 UNION ALL
//       SELECT 200624934 UNION ALL
//       SELECT 200666914 UNION ALL
//       SELECT 200671933 UNION ALL
//       SELECT 200794510 UNION ALL
//       SELECT 200845984 UNION ALL
//       SELECT 200851559 UNION ALL
//       SELECT 200936435 UNION ALL
//       SELECT 200936751 UNION ALL
//       SELECT 200936783 UNION ALL
//       SELECT 201007711 UNION ALL
//       SELECT 201059323 UNION ALL
//       SELECT 201104719 UNION ALL
//       SELECT 201122206 UNION ALL
//       SELECT 201122349
//       ) AS temp
// LEFT JOIN tashkilots t ON temp.stir_raqami = t.stir_raqami
// WHERE t.stir_raqami IS NULL;

