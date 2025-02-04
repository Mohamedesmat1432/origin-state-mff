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

    #[On('refresh-list-company')]
    public function render()
    {
        $this->authorize('view-company');

        $companys = Company::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Company::pluck('id')->toArray();

        return view('livewire.company.list-company', [
            'companys' => $companys,
        ]);
    }
}
