<?php

namespace App\Livewire\Origin;

use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteOrigin extends Component
{
    use OriginTrait;
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
        $this->bulkDeleteOrigin($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-origin');

        return view('livewire.origin.bulk-delete-origin');
    }
}
