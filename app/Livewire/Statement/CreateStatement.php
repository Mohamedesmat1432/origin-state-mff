<?php

namespace App\Livewire\Statement;

use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateStatement extends Component
{
    use StatementTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeStatement();
    }

    public function render()
    {
        $this->authorize('create-statement');

        return view('livewire.statement.create-statement');
    }
}
