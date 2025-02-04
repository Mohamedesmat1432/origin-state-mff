<?php

namespace App\Livewire\User;

use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ForceBulkDeleteUser extends Component
{
    use UserTrait;
    public $count;

    #[On('force-bulk-delete-modal')]
    public function confirmDelete($arr)
    {
        $this->checkbox_arr = json_decode($arr);
        $this->count = count($this->checkbox_arr);
        $this->force_bulk_delete_modal = true;
    }

    public function delete()
    {
        $this->forceBulkDeleteUser($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('force-bulk-delete-user');

        return view('livewire.user.force-bulk-delete-user');
    }
}
