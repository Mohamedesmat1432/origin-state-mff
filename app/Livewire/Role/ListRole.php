<?php

namespace App\Livewire\Role;

use App\Traits\RoleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListRole extends Component
{
    use RoleTrait;

    protected $queryString = [
        'filters',
    ];

    #[On('refresh-list-role')]
    public function render()
    {
        $this->authorize('view-role');

        return view('livewire.role.list-role', [
            'roles' => $this->listRoles(),
        ]);
    }
}
