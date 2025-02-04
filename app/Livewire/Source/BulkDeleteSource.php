<?php

namespace App\Livewire\Source;

use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteSource extends Component
{
    use SourceTrait;
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
        $this->bulkDeleteSource($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-source');

        return view('livewire.source.bulk-delete-source');
    }
}
