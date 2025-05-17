<?php

namespace App\Livewire\Department;

use App\Models\Department;
use App\Traits\DepartmentTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListDepartment extends Component
{
    use DepartmentTrait;

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-department')]
    public function render()
    {
        $this->authorize('view-department');

        return view('livewire.department.list-department', [
            'departments' => $this->listDepartments(),
            'count_all' => Department::count(),
        ]);
        
    }
}
