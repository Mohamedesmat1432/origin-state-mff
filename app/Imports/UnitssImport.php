<?php

namespace App\Imports;

use App\Models\Units;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitssImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Units([
            //
        ]);
    }
}
