<?php

namespace App\Livewire\DecisionType;

use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateDecisionType extends Component
{
    use DecisionTypeTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setDecisionType($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateDecisionType();
    }

    public function render()
    {
        $this->authorize('edit-decision-type');

        return view('livewire.decision-type.update-decision-type');
    }
}
