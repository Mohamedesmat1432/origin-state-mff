<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Services\ChartService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ChartUser extends Component
{
    public $chartDataUser;

    protected ChartService $service;

    public function boot(ChartService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->authorize('view-chart-user');

        $this->chartDataUser = $this->service->chartByDate(User::class, __('site.users'));
    }

    public function render()
    {
        return view('livewire.chart.chart-user');
    }
}
