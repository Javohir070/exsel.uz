<?php

namespace App\Exports;

use App\Models\IlmiyLoyiha;
use Maatwebsite\Excel\Concerns\FromCollection;

class IlmiyLoyihasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IlmiyLoyiha::all();
    }
}
