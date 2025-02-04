<?php

namespace App\Livewire\Statement;

use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateStatement extends Component
{
    use StatementTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setStatement($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateStatement();
    }

    public function render()
    {
        $this->authorize('edit-statement');

        return view('livewire.statement.update-statement');
    }
}
