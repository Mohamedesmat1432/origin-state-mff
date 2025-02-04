<?php

namespace App\Livewire\User;

use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateUser extends Component
{
    use UserTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeUser();
    }

    public function render()
    {
        $this->authorize('create-user');

        return view('livewire.user.create-user');
    }
}
