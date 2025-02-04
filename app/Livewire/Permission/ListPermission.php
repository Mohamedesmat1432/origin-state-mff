<?php

namespace App\Livewire\Permission;

use App\Models\Permission;
use App\Traits\PermissionTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListPermission extends Component
{
    use PermissionTrait;

    #[On('refresh-list-permission')]
    public function render()
    {
        $this->authorize('view-permission');

        $permissions = Permission::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        return view('livewire.permission.list-permission', [
            'permissions' => $permissions,
        ]);

    }
}
