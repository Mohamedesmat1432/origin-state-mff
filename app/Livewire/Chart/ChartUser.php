<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Services\Chart\ChartByMonthCountInterface;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ChartUser extends Component
{
    public $chartDataUser;

    protected ChartByMonthCountInterface $chartByMonthCount;
    
    public function mount()
    {
        $this->authorize('view-chart-user');

        $this->chartByMonthCount = app(ChartByMonthCountInterface::class);
        
        $this->chartDataUser = $this->chartByMonthCount->generateData(User::class, __('site.users'));
    }

    public function render()
    {
        return view('livewire.chart.chart-user');
    }
}
