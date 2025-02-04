<?php

namespace App\Livewire\Department;

use App\Traits\DepartmentTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateDepartment extends Component
{
    use DepartmentTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeDepartment();
    }

    public function render()
    {
        $this->authorize('create-department');

        return view('livewire.department.create-department');
    }
}
