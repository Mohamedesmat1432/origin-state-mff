<?php

namespace App\Livewire\Company;

use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteCompany extends Component
{
    use CompanyTrait;

    #[Locked]
    public $id, $name;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteCompany($this->id);
    }

    public function render()
    {
        $this->authorize('delete-company');

        return view('livewire.company.delete-company');
    }
}
