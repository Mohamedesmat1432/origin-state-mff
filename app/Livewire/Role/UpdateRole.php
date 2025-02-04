<?php

namespace App\Livewire\Role;

use App\Traits\RoleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateRole extends Component
{
    use RoleTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setRole($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateRole();
    }

    public function render()
    {
        $this->authorize('edit-role');

        return view('livewire.role.update-role');
    }
}
