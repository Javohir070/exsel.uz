<?php

namespace App\Exports;

use App\Models\Xujalik;
use Maatwebsite\Excel\Concerns\FromCollection;

class XujalikExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Xujalik::all();
    }
}
