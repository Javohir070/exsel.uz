<?php

namespace App\Exports;

use App\Models\Izlanuvchilar;
use Maatwebsite\Excel\Concerns\FromCollection;

class IzlanuvchilarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Izlanuvchilar::all();
    }
}
