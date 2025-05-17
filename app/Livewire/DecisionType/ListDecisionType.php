<?php

namespace App\Livewire\DecisionType;

use App\Models\DecisionType;
use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListDecisionType extends Component
{
    use DecisionTypeTrait;

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-decision-type')]
    public function render()
    {
        $this->authorize('view-decision-type');

        return view('livewire.decision-type.list-decision-type', [
            'decision_types' => $this->listDecisionTypes(),
        ]);
    }
}
