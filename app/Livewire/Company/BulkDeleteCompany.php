<?php

namespace App\Livewire\Company;

use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteCompany extends Component
{
    use CompanyTrait;
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
        $this->bulkDeleteCompany($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-company');

        return view('livewire.company.bulk-delete-company');
    }
}
