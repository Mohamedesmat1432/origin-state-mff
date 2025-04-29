<?php

namespace App\Services\Chart;

use Carbon\Carbon;

class ChartByRelationCountService implements ChartByRelationCountInterface
{
    public function generateData($modelClass, $label, $groupBy = 'government')
    {
        // Fetch data for the User model grouped by month
        $monthlyData = $modelClass::with([$groupBy])
            ->get()
            ->groupBy(function ($origin) use ($groupBy) {
                switch ($groupBy) {
                    case 'government':
                    case 'city':
                    case 'project':
                        return optional($origin->{$groupBy})->name ?? 'Unknown';
                    case 'origin_status':
                        return $origin->origin_status?->label() ?? 'Unknown';
                    default:
                        return 'Unknown';
                }
            })
            ->map(fn($group) => $group->count());

        // Prepare the chart data structure
        $colors = collect([
            '#3b82f6',
            '#10b981',
            '#f59e0b',
            '#ef4444',
            '#8b5cf6',
            '#ec4899',
            '#22d3ee'
        ])->pad(count($monthlyData), '#a3a3a3');

        $borderColors = collect([
            '#3b82f6',
            '#10b981',
            '#f59e0b',
            '#ef4444',
            '#8b5cf6',
            '#ec4899',
            '#22d3ee'
        ])->pad(count($monthlyData), '#a3a3a3');

        return [
            'labels' => $monthlyData->keys(),
            'datasets' => [
                [
                    'label' => $label,
                    'backgroundColor' => $colors,
                    'borderColor' => $borderColors,
                    'hoverOffset' => 4,
                    'borderWidth' => 1,
                    'data' => $monthlyData->values(),
                ],
            ],
        ];
    }
}
