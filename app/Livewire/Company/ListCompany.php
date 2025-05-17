<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListCompany extends Component
{
    use CompanyTrait;

    protected $queryString = [
        'filters',
    ];

    #[On('refresh-list-company')]
    public function render()
    {
        $this->authorize('view-company');

        return view('livewire.company.list-company', [
            'companys' => $this->listCompanies(),
        ]);
    }
}
