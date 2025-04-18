<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListUser extends Component
{
    use UserTrait;

    #[On('refresh-list-user')]
    public function render()
    {
        $this->authorize('view-user');

        $users = $this->trash ? User::with('roles')->onlyTrashed() : User::with('roles')->withoutTrashed();

        $users = $users->search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = $users->pluck('id')->toArray();

        return view('livewire.user.list-user', [
            'users' => $users,
        ]);
    }
}
