<?php

namespace App\Livewire\Permission;

use App\Traits\PermissionTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeletePermission extends Component
{
    use PermissionTrait;

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
        $this->authorize('delete-permission');

        $this->deletePermission($this->id);
    }

    public function render()
    {
        return view('livewire.permission.delete-permission');
    }
}
