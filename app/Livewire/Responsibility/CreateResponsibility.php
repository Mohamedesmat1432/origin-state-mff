<?php

namespace App\Livewire\Responsibility;

use App\Traits\ResponsibilityTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateResponsibility extends Component
{
    use ResponsibilityTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeResponsibility();
    }

    public function render()
    {
        $this->authorize('create-responsibility');

        return view('livewire.responsibility.create-responsibility');
    }
}
