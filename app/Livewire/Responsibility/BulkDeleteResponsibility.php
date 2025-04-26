<?php

namespace App\Livewire\Responsibility;

use App\Traits\ResponsibilityTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteResponsibility extends Component
{
    use ResponsibilityTrait;
    public $count;

    #[On('bulk-delete-modal')]
    public function confirmDelete($arr)
    {
        $this->checkbox_arr = json_decode($arr);
        $this->count = count($this->checkbox_arr);
        $this->bulk_delete_modal = true;
    }

    public function delete()
    {
        $this->bulkDeleteResponsibility($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-responsibility');

        return view('livewire.responsibility.bulk-delete-responsibility');
    }
}
