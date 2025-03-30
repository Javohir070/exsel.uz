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


// SELECT  temp.stir_raqami
// FROM (
//       SELECT 302774340 AS stir_raqami UNION ALL
//       SELECT 309546681 UNION ALL
//       SELECT 308769405 UNION ALL
//       SELECT 309727757 UNION ALL
//       SELECT 308282696 UNION ALL
//       SELECT 311006966 UNION ALL
//       SELECT 309732958 UNION ALL
//       SELECT 201200053 UNION ALL
//       SELECT 309730114 UNION ALL
//       SELECT 309564565 UNION ALL
//       SELECT 305192336 UNION ALL
//       SELECT 305311179 UNION ALL
//       SELECT 207325289 UNION ALL

//       SELECT 202601843 UNION ALL
//       SELECT 308592912 UNION ALL
//       SELECT 311636483 UNION ALL
//       SELECT 311516893 UNION ALL
//       SELECT 302436579 UNION ALL
//       SELECT 309855582 UNION ALL
//       SELECT 307787179 UNION ALL
//       SELECT 300777608 UNION ALL
//       SELECT 200836314 UNION ALL
//       SELECT 309828909 UNION ALL
//       SELECT 309822046 UNION ALL
//       SELECT 305652539 UNION ALL
//       SELECT 202629404 UNION ALL
//       SELECT 200522849 UNION ALL
//       SELECT 310124583 UNION ALL
//       SELECT 302988629 UNION ALL
//       SELECT 310306672 UNION ALL
//       SELECT 200496217 UNION ALL
//       SELECT 207271895 UNION ALL
//       SELECT 308709154 UNION ALL
//       SELECT 303974882 UNION ALL
//       SELECT 305246844 UNION ALL
//       SELECT 311008156 UNION ALL
//       SELECT 307886514
//       ) AS temp
// LEFT JOIN tashkilots t ON temp.stir_raqami = t.stir_raqami
// WHERE t.stir_raqami IS NULL;

