<?php

namespace App\Services\Chart;

interface ChartByRelationCountInterface
{
    public function generateData($modelClass, $label, $groupBy = '');
}
