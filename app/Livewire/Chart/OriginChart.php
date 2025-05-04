<?php

namespace App\Livewire\Chart;

use App\Models\Origin;
use App\Services\ChartService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class OriginChart extends Component
{
    protected ChartService $service;

    public $chartDataOrigin;
    public $groupBy = 'government';

    public function boot(ChartService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->groupBy = session('groupByOrigin', 'government');
        $this->loadData();
    }

    public function updatedGroupBy()
    {
        session(['groupByOrigin' => $this->groupBy]);
        $this->loadData();
        $this->dispatch('chart-updated', chartData: $this->chartDataOrigin);
    }

    public function loadData()
    {
        $this->chartDataOrigin = $this->service->chartByRelation(Origin::class, __('site.origins'), $this->groupBy);
    }

    public function render()
    {
        $this->authorize('view-chart-origin');

        return view('livewire.chart.origin-chart');
    }
}
