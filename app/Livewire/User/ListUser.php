<?php

namespace App\Livewire\User;

use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListUser extends Component
{
    use UserTrait;

    protected $queryString = [
        'filters',
        'sort',
        'trash',
    ];

    #[On('refresh-list-user')]
    public function render()
    {
        $this->authorize('view-user');

        return view('livewire.user.list-user', [
            'users' => $this->listUsers(),
        ]);
    }
}
