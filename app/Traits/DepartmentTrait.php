<?php

namespace App\Traits;

use App\Models\Department;
use Livewire\WithPagination;

trait DepartmentTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Department $department;

    public ?string $department_id = null;
    public ?string $name = null;

    public array $filters = [
        'search' => '',
    ];

    public array $sort = [
        'by' => 'id',
        'asc' => false,
    ];

    public function sortByField($field)
    {
        if ($field == $this->sort['by']) {
            $this->sort['asc'] = !$this->sort['asc'];
        }
        $this->sort['by'] = $field;
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:departments,name,' . $this->department_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'department_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listDepartments()
    {
        $query = Department::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get(); // Get the results but don't paginate
        });
        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listDepartments()->pluck('id')->toArray());
    }

    public function setDepartment($id)
    {
        $this->department = Department::findOrFail($id);
        $this->department_id = $this->department->id;
        $this->name = $this->department->name;
    }

    public function storeDepartment()
    {
        $validated = $this->validate();
        Department::create($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-department');
        $this->successNotify(__('site.department_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateDepartment()
    {
        $validated = $this->validate();
        $this->department->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-department');
        $this->successNotify(__('site.department_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteDepartment($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-department');
        $this->successNotify(__('site.department_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteDepartment($arr)
    {
        $departments = Department::whereIn('id', $arr);
        $departments->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-department');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.department_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
