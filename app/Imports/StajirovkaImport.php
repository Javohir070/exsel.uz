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
//       SELECT 200555411 AS stir_raqami UNION ALL
//       SELECT 305670152 UNION ALL
//       SELECT 200776445 UNION ALL
//       SELECT 204514063 UNION ALL
//       SELECT 201122704 UNION ALL
//       SELECT 201059140 UNION ALL
//       SELECT 200845937 UNION ALL
//       SELECT 306257656 UNION ALL
//       SELECT 202234169 UNION ALL
//       SELECT 201155766 UNION ALL
//       SELECT 202174022 UNION ALL
//       SELECT 302892567 UNION ALL
//       SELECT 204065852 UNION ALL

//       SELECT 302938752 UNION ALL
//       SELECT 202238320 UNION ALL
//       SELECT 200555578 UNION ALL
//       SELECT 205771544 UNION ALL
//       SELECT 202001220 UNION ALL
//       SELECT 201053370 UNION ALL
//       SELECT 200936435 UNION ALL
//       SELECT 203548426 UNION ALL
//       SELECT 201672757 UNION ALL
//       SELECT 201059323 UNION ALL
//       SELECT 305028989 UNION ALL
//       SELECT 309546681 UNION ALL
//       SELECT 200936751 UNION ALL
//       SELECT 302828304 UNION ALL
//       SELECT 304909478 UNION ALL
//       SELECT 201992106 UNION ALL
//       SELECT 201504275 UNION ALL
//       SELECT 305659662 UNION ALL
//       SELECT 307704755 UNION ALL
//       SELECT 309822118 UNION ALL
//       SELECT 307754529 UNION ALL
//       SELECT 200580310 UNION ALL
//       SELECT 202562039 UNION ALL
//       SELECT 200272013 UNION ALL
//       SELECT 204504275 UNION ALL
//       SELECT 300777608 UNION ALL
//       SELECT 305719721 UNION ALL
//       SELECT 309838634 UNION ALL
//       SELECT 200357981 UNION ALL
//       SELECT 201878451 UNION ALL
//       SELECT 200794463 UNION ALL
//       SELECT 309225266 UNION ALL
//       SELECT 200577258 UNION ALL
//       SELECT 200237442 UNION ALL
//       SELECT 200541105 UNION ALL
//       SELECT 207283968 UNION ALL
//       SELECT 200935928
//       ) AS temp
// LEFT JOIN tashkilots t ON temp.stir_raqami = t.stir_raqami
// WHERE t.stir_raqami IS NULL;

