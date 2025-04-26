<?php

namespace App\Livewire\DecisionType;

use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateDecisionType extends Component
{
    use DecisionTypeTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeDecisionType();
    }

    public function render()
    {
        $this->authorize('create-decision-type');

        return view('livewire.decision-type.create-decision-type');
    }
}
