<?php

namespace App\Livewire\Origin;

use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateOrigin extends Component
{
    use OriginTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setOrigin($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateOrigin();
    }

    public function render()
    {
        $this->authorize('edit-origin');

        return view('livewire.origin.update-origin');
    }
}
