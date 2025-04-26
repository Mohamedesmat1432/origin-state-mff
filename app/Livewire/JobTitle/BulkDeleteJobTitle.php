<?php

namespace App\Livewire\JobTitle;

use App\Traits\JobTitleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteJobTitle extends Component
{
    use JobTitleTrait;
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
        $this->bulkDeleteJobTitle($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-job-title');

        return view('livewire.job-title.bulk-delete-job-title');
    }
}
