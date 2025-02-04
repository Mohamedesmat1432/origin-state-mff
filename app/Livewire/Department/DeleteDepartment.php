<?php

namespace App\Livewire\Department;

use App\Traits\DepartmentTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteDepartment extends Component
{
    use DepartmentTrait;

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
        $this->deleteDepartment($this->id);
    }

    public function render()
    {
        $this->authorize('delete-department');

        return view('livewire.department.delete-department');
    }
}
