<?php

namespace App\Livewire\Company;

use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateCompany extends Component
{
    use CompanyTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setCompany($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateCompany();
    }

    public function render()
    {
        $this->authorize('edit-company');

        return view('livewire.company.update-company');
    }
}
