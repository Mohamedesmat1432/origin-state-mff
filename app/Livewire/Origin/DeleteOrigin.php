<?php

namespace App\Livewire\Origin;

use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteOrigin extends Component
{
    use OriginTrait;

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
        $this->deleteOrigin($this->id);
    }

    public function render()
    {
        $this->authorize('delete-origin');

        return view('livewire.origin.delete-origin');
    }
}
