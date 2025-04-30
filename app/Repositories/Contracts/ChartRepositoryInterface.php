<?php

namespace App\Repositories\Contracts;

interface ChartRepositoryInterface
{
    public function generateDataByDate($modelClass, $label, $dateColumn = 'created_at');
    public function generateDataByRelation($modelClass, $label, $groupBy);

}
