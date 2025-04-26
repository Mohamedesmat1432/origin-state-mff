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

    #[On('refresh-list-decision-type')]
    public function render()
    {
        $this->authorize('view-decision-type');

        $decision_types = DecisionType::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = DecisionType::pluck('id')->toArray();

        return view('livewire.decision-type.list-decision-type', [
            'decision_types' => $decision_types,
        ]);
    }
}
