<?php

namespace App\Exports;

use App\Models\Source;
use Maatwebsite\Excel\Concerns\FromCollection;

class SourcesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Source::all();
    }
}
