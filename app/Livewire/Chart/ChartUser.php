<?php

namespace App\Livewire\Chart;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ChartUser extends Component
{
    public $chartDataUser;

    public function mount()
    {
        // Fetch data grouped by month
        $monthlyData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::create()->month($item->month)->format('F') => $item->count];
            });

        $this->chartDataUser = [
            'labels' => $monthlyData->keys(),
            'datasets' => [
                [
                    'label' => __('site.users'),
                    'backgroundColor' => [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(75, 192, 192, 0.9)',
                        'rgba(75, 192, 192, 0.10)',
                        'rgba(75, 192, 192, 0.11)',
                        'rgba(75, 192, 192, 0.12)',
                    ],
                    'borderColor' => [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(75, 192, 192, 0.9)',
                        'rgba(75, 192, 192, 0.10)',
                        'rgba(75, 192, 192, 0.11)',
                        'rgba(75, 192, 192, 0.12)',
                    ],
                    'hoverOffset' => 4,
                    'borderWidth' => 1,
                    'data' => $monthlyData->values(),
                ],
            ],
        ];
    }

    public function render()
    {
        $this->authorize('view-chart-user');

        return view('livewire.chart.chart-user');
    }
}
