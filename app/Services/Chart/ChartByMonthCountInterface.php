<?php

namespace App\Services\Chart;

interface ChartByMonthCountInterface
{
    public function generateData($modelClass, $label, $dateColumn = 'created_at');
}
