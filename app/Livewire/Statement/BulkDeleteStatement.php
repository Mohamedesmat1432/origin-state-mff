<?php

namespace App\Livewire\Statement;

use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteStatement extends Component
{
    use StatementTrait;
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
        $this->bulkDeleteStatement($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-statement');

        return view('livewire.statement.bulk-delete-statement');
    }
}
