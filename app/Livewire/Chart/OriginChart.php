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
    public $relation = 'government';

    public function boot(ChartService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->authorize('view-chart-origin');
        $this->relation = session('relationOrigin', 'government');
        $this->loadData();
    }

    public function updatedRelation()
    {
        session(['relationOrigin' => $this->relation]);
        $this->loadData();
        $this->dispatch('chart-updated', chartData: $this->chartDataOrigin);
    }

    public function loadData()
    {
        $this->chartDataOrigin = $this->service->chartByRelation(Origin::class, __('site.origins'), $this->relation);
    }

    public function render()
    {
        return view('livewire.chart.origin-chart');
    }
}
