<?php

namespace App\Livewire\Company;

use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateCompany extends Component
{
    use CompanyTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeCompany();
    }

    public function render()
    {
        $this->authorize('create-company');

        return view('livewire.company.create-company');
    }
}
