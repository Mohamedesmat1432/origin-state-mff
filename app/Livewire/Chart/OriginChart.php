<?php

namespace App\Livewire\Chart;

use App\Models\Origin;
use App\Services\Chart\ChartByRelationCountInterface;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class OriginChart extends Component
{
    public $chartDataOrigin;

    protected ChartByRelationCountInterface $chartByRelationCount;
    
    public function mount()
    {
        $this->authorize('view-chart-origin');
        $this->loadData();
    }

    public function loadData()
    {
        $this->chartByRelationCount = app(ChartByRelationCountInterface::class);
        $this->chartDataOrigin = $this->chartByRelationCount->generateData(Origin::class, __('site.origins'), 'government');
    }


    public function render()
    {
        return view('livewire.chart.origin-chart');
    }
}
