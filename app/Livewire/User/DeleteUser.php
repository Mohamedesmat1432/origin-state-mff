<?php

namespace App\Livewire\User;

use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteUser extends Component
{
    use UserTrait;

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
        $this->deleteUser($this->id);
    }

    public function render()
    {
        $this->authorize('delete-user');

        return view('livewire.user.delete-user');
    }
}
