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
                    // 'backgroundColor' => $colors,
                    // 'borderColor' => $colors,
                    'hoverOffset' => 4,
                    'borderWidth' => 1,
                    'data' => $data->values(),
                    'locale' => 'ar'
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
                // return optional($origin->{$groupBy})->name;

                switch ($groupBy) {
                    case 'government':
                        return optional($origin->{$groupBy})->name;
                    case 'city':
                        return optional($origin->{$groupBy})->name;
                    case 'project':
                        return optional($origin->{$groupBy})->name;
                    case 'statement':
                        return optional($origin->{$groupBy})->name;
                    case 'decisionType':
                        return optional($origin->{$groupBy})->name;
                    case 'createdBy':
                        return optional($origin->{$groupBy})->name;
                    case 'revisedBy':
                        return optional($origin->{$groupBy})->name;
                    case 'completedBy':
                        return optional($origin->{$groupBy})->name;
                    default:
                        return 'Unknown';
                }
            })
            ->map(fn($group) => ($group->count() > 0) ? $group->count() : 0);

        // Prepare the chart data structure
        $colors = $this->generateRandomColors(count($data));

        return [
            'labels' => $data->keys(),
            'datasets' => [
                [
                    'label' => $label,
                    // 'backgroundColor' => $colors,
                    // 'borderColor' => $colors,
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
            return 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ',0.6)';
        })->toArray();
    }
}
