<?php

namespace App\Exports;

use App\Models\Origin;
use Maatwebsite\Excel\Concerns\FromCollection;

class OriginsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Origin::all();
    }
}
