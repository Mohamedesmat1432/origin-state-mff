<?php

namespace App\Livewire\Statement;

use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteStatement extends Component
{
    use StatementTrait;

    #[Locked]
    public ?string $id = null;

    #[Locked]
    public ?string $name = null;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteStatement($this->id);
    }

    public function render()
    {
        $this->authorize('delete-statement');

        return view('livewire.statement.delete-statement');
    }
}
