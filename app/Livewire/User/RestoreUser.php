<?php

namespace App\Livewire\User;

use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class RestoreUser extends Component
{
    use UserTrait;

    #[Locked]
    public ?string $id = null;

    #[Locked]
    public ?string $name = null;

    #[On('restore-modal')]
    public function confirmRestore($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->restore_modal = true;
    }

    public function restore()
    {
        $this->restoreUser($this->id);
    }

    public function render()
    {
        $this->authorize('restore-user');

        return view('livewire.user.restore-user');
    }
}
