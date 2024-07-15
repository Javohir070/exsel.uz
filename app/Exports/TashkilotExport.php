<?php

namespace App\Exports;

use App\Models\Tashkilot;
use Maatwebsite\Excel\Concerns\FromCollection;

class TashkilotExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tashkilot::all();
    }
}
