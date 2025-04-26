<?php

namespace App\Exports;

use App\Models\Responsibility;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResponsibilitysExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Responsibility::all();
    }
}
