<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ChartRepositoryInterface;
use Carbon\Carbon;

class ChartRepository implements ChartRepositoryInterface
{
    public function generateDataByDate($modelClass, $label, $dateColumn = 'created_at')
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

    public function generateDataByRelation($modelClass, $label, $groupBy)
    {
        // Fetch data for the User model grouped by month
        $monthlyData = $modelClass::with([$groupBy])
            ->get()
            ->groupBy(function ($origin) use ($groupBy) {
                switch ($groupBy) {
                    case 'government':
                        return optional($origin->{$groupBy})->name ?? 'Unknown';
                    case 'city':
                        return optional($origin->{$groupBy})->name ?? 'Unknown';
                    case 'project':
                        return optional($origin->{$groupBy})->name ?? 'Unknown';
                    case 'statement':
                        return optional($origin->{$groupBy})->name ?? 'Unknown';
                    case 'decisionType':
                        return optional($origin->{$groupBy})->name ?? 'Unknown';
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
