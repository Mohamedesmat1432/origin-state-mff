<?php

namespace App\Imports;

use App\Models\Responsibility;
use Maatwebsite\Excel\Concerns\ToModel;

class ResponsibilitysImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Responsibility([
            //
        ]);
    }
}
