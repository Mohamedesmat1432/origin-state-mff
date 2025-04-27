<?php

namespace App\Livewire\DecisionType;

use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteDecisionType extends Component
{
    use DecisionTypeTrait;
    
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
        $this->bulkDeleteDecisionType($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-decision-type');

        return view('livewire.decision-type.bulk-delete-decision-type');
    }
}
