<?php

namespace App\Livewire\Company;

use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowCompany extends Component
{
    use CompanyTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setCompany($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-company');

        return view('livewire.company.show-company');
    }
}
