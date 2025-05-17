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

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-permission')]
    public function render()
    {
        $this->authorize('view-permission');

        return view('livewire.permission.list-permission', [
            'permissions' => $this->listPermissions(),
        ]);

    }
}
