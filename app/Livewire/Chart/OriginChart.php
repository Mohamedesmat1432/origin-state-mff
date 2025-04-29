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

    public $relation = 'city';

    protected ChartByRelationCountInterface $chartByRelationCount;
    
    public function mount()
    {
        $this->authorize('view-chart-origin');
        $this->loadData();
    }

    public function updatedRelation()
    {
        $this->loadData();
        $this->dispatch('chart-updated');
    }

    public function loadData()
    {
        $this->chartByRelationCount = app(ChartByRelationCountInterface::class);
        $this->chartDataOrigin = $this->chartByRelationCount->generateData(Origin::class, __('site.origins'), $this->relation);
    }


    public function render()
    {
        return view('livewire.chart.origin-chart');
    }
}
