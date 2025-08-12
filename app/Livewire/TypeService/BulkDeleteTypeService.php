<?php

namespace App\Livewire\TypeService;

use App\Traits\TypeServiceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteTypeService extends Component
{
    use TypeServiceTrait;
    
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
        $this->bulkDeleteTypeService($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-type-service');

        return view('livewire.type-service.bulk-delete-type-service');
    }
}
