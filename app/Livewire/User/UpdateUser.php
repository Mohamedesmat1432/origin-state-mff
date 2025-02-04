<?php

namespace App\Livewire\User;

use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateUser extends Component
{
    use UserTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setUser($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateUser();
    }

    public function render()
    {
        $this->authorize('edit-user');

        return view('livewire.user.update-user');
    }
}
