<?php

namespace App\Livewire\Origin;

use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateOrigin extends Component
{
    use OriginTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeOrigin();
    }

    public function render()
    {
        $this->authorize('create-origin');

        return view('livewire.origin.create-origin');
    }
}
