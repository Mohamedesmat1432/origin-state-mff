<?php

namespace App\Exports;

use App\Models\Units;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnitssExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Units::all();
    }
}
