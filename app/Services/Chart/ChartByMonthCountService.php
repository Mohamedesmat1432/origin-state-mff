<?php

namespace App\Services\Chart;

use Carbon\Carbon;

class ChartByMonthCountService implements ChartByMonthCountInterface
{
    public function generateData($modelClass, $label, $dateColumn = 'created_at')
    {
        // Fetch data for the User model grouped by month
        $monthlyData = $modelClass::selectRaw("MONTH({$dateColumn}) as month, COUNT(*) as count")
            ->groupBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::create()->month($item->month)->format('F') => $item->count];
            });

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
