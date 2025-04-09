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
//       SELECT 302938752 AS stir_raqami UNION ALL
//       SELECT 308518463 UNION ALL
//       SELECT 207209614 UNION ALL
//       SELECT 202234191 UNION ALL
//       SELECT 200564908 UNION ALL
//       SELECT 200555578 UNION ALL
//       SELECT 302938752 UNION ALL
//       SELECT 207209606 UNION ALL
//       SELECT 309838634 UNION ALL
//       SELECT 200555411 UNION ALL
//       SELECT 201155766 UNION ALL
//       SELECT 202174022 UNION ALL
//       SELECT 201603524 UNION ALL

//       SELECT 206977863 UNION ALL
//       SELECT 302892567 UNION ALL
//       SELECT 200540541 UNION ALL
//       SELECT 204065852 UNION ALL
//       SELECT 305827359 UNION ALL

//       SELECT 200776445 UNION ALL
//       SELECT 200851559 UNION ALL
//       SELECT 201122704 UNION ALL
//       SELECT 201104719 UNION ALL
//       SELECT 201763460 UNION ALL
//       SELECT 305827359 UNION ALL
//       SELECT 302259434 UNION ALL
//       SELECT 201689853 UNION ALL
//       SELECT 202548426 UNION ALL
//       SELECT 200898444 UNION ALL
//       SELECT 201266454 UNION ALL
//       SELECT 201849882 UNION ALL
//       SELECT 201059140 UNION ALL
//       SELECT 307754529 UNION ALL
//       SELECT 309822118 UNION ALL
//       SELECT 304909478 UNION ALL
//       SELECT 200577258 UNION ALL
//       SELECT 200845937 UNION ALL
//       SELECT 203548426 UNION ALL
//       SELECT 204514063 UNION ALL
//       SELECT 306734363 UNION ALL
//       SELECT 200140794 UNION ALL
//       SELECT 200898483 UNION ALL
//       SELECT 305659662 UNION ALL
//       SELECT 200795153 UNION ALL
//       SELECT 302828304 UNION ALL
//       SELECT 305925119 UNION ALL
//       SELECT 305670152 UNION ALL
//       SELECT 309225266 UNION ALL
//       SELECT 200666914 UNION ALL
//       SELECT 307704755 UNION ALL
//       SELECT 309546681
//       ) AS temp
// LEFT JOIN tashkilots t ON temp.stir_raqami = t.stir_raqami
// WHERE t.stir_raqami IS NULL;

