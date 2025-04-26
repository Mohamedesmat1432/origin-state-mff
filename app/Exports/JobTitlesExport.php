<?php

namespace App\Exports;

use App\Models\JobTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class JobTitlesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobTitle::all();
    }
}
