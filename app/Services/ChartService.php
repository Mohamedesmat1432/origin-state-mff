<?php

namespace App\Services;

use App\Repositories\Contracts\ChartRepositoryInterface;

class ChartService
{
    protected $chartRepo;

    public function __construct(ChartRepositoryInterface $chartRepo)
    {
        $this->chartRepo = $chartRepo;
    }

    public function chartByDate($modelClass, $label, $dateColumn = 'created_at')
    {
        return $this->chartRepo->generateDataByDate($modelClass, $label, $dateColumn);
    }

    public function chartByRelation($modelClass, $label, $groupBy = 'government')
    {
        return $this->chartRepo->generateDataByRelation($modelClass, $label, $groupBy);
    }
}
