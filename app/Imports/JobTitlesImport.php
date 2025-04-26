<?php

namespace App\Imports;

use App\Models\JobTitle;
use Maatwebsite\Excel\Concerns\ToModel;

class JobTitlesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JobTitle([
            //
        ]);
    }
}
