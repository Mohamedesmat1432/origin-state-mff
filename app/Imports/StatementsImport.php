<?php

namespace App\Imports;

use App\Models\Statement;
use Maatwebsite\Excel\Concerns\ToModel;

class StatementsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Statement([
            //
        ]);
    }
}
