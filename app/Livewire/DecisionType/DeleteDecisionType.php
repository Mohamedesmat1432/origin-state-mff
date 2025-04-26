<?php

namespace App\Livewire\DecisionType;

use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteDecisionType extends Component
{
    use DecisionTypeTrait;

    #[Locked]
    public $id, $name;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteDecisionType($this->id);
    }

    public function render()
    {
        $this->authorize('delete-decision-type');

        return view('livewire.decision-type.delete-decision-type');
    }
}
