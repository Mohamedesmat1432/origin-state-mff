<?php

namespace App\Traits;

use App\Models\Department;
use Livewire\WithPagination;

trait DepartmentTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Department $department;

    public $name_ar, $name_en, $department_id;

    protected function rules()
    {
        return [
            'name_ar' => 'required|string|max:255|unique:departments,name_ar,' . $this->department_id,
            'name_en' => 'required|string|max:255|unique:departments,name_en,' . $this->department_id,
        ];
    }

    public function setDepartment($id)
    {
        $this->department = Department::findOrFail($id);
        $this->department_id = $this->department->id;
        $this->name_ar = $this->department->name_ar;
        $this->name_en = $this->department->name_en;
    }

    public function storeDepartment()
    {
        $validated = $this->validate();
        Department::create($validated);
        $this->dispatch('refresh-list-department');
        $this->successNotify(__('site.department_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateDepartment()
    {
        $validated = $this->validate();
        $this->department->update($validated);
        $this->dispatch('refresh-list-department');
        $this->successNotify(__('site.department_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteDepartment($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        $this->dispatch('refresh-list-department');
        $this->successNotify(__('site.department_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteDepartment($arr)
    {
        $departments = Department::whereIn('id', $arr);
        $departments->delete();
        $this->dispatch('refresh-list-department');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.department_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
