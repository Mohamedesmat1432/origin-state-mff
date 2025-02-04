<?php

namespace App\Livewire\Project;

use App\Traits\ProjectTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteProject extends Component
{
    use ProjectTrait;
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
        $this->bulkDeleteProject($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-project');

        return view('livewire.project.bulk-delete-project');
    }
}
