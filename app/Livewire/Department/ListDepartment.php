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

    #[On('refresh-list-department')]
    public function render()
    {
        $this->authorize('view-department');

        $departments = Department::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Department::pluck('id')->toArray();

        return view('livewire.department.list-department', [
            'departments' => $departments,
        ]);
        
    }
}
