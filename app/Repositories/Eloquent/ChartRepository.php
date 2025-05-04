<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ChartRepositoryInterface;
use Carbon\Carbon;

class ChartRepository implements ChartRepositoryInterface
{
    public function generateDataByDate($modelClass, $label, $dateColumn = 'created_at')
    {
        // Fetch data for the User model grouped by month
        $data = $modelClass::selectRaw("MONTH({$dateColumn}) as month, COUNT(*) as count")
            ->groupBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::create()->month($item->month)->format('F') => $item->count];
            });

        // Prepare the chart data structure
        $colors = $this->generateRandomColors(count($data));

        return [
            'labels' => $data->keys(),
            'datasets' => [
                [
                    'label' => $label,
                    'backgroundColor' => $colors,
                    'borderColor' => $colors,
                    'hoverOffset' => 4,
                    'borderWidth' => 1,
                    'data' => $data->values(),
                ],
            ],
        ];
    }

    public function generateDataByRelation($modelClass, $label, $groupBy)
    {
        // Fetch data for the User model grouped by month
        $data = $modelClass::with([$groupBy])
            ->get()
            ->groupBy(function ($origin) use ($groupBy) {
                // return optional($origin->{$groupBy})->name ?? 'Unknown';

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
        $colors = $this->generateRandomColors(count($data));

        return [
            'labels' => $data->keys(),
            'datasets' => [
                [
                    'label' => $label,
                    'backgroundColor' => $colors,
                    'borderColor' => $colors,
                    'hoverOffset' => 4,
                    'borderWidth' => 1,
                    'data' => $data->values(),
                ],
            ],
        ];
    }

    public function generateRandomColors($count)
    {
        return collect(range(1, $count))->map(function () {
            return 'rgba(' . rand(0,255) . ',' . rand(0,255) . ',' . rand(0,255) . ',0.6)';
        })->toArray();
    }
}
