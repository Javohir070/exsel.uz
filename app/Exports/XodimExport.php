<?php

namespace App\Exports;

use App\Models\Xodimlar;
use Maatwebsite\Excel\Concerns\FromCollection;

class XodimExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Xodimlar::all();
    }
}
