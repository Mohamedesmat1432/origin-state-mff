<?php

namespace App\Livewire\Responsibility;

use App\Traits\ResponsibilityTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateResponsibility extends Component
{
    use ResponsibilityTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setResponsibility($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateResponsibility();
    }

    public function render()
    {
        $this->authorize('edit-responsibility');

        return view('livewire.responsibility.update-responsibility');
    }
}
