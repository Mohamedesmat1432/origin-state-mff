<?php

namespace App\Traits;

use App\Models\Permission;
use Livewire\WithPagination;

trait PermissionTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Permission $permission;

    public ?string $permission_id = null;
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
            'name' => 'required|string|min:2|unique:permissions,name,' . $this->permission_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'permission_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listPermissions()
    {
        $query = Permission::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get(); // Get the results but don't paginate
        });
        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listPermissions()->pluck('id')->toArray());
    }

    public function setPermission($id)
    {
        $this->permission = Permission::findOrFail($id);
        $this->permission_id = $this->permission->id;
        $this->name = $this->permission->name;
    }

    public function storePermission()
    {
        $validated = $this->validate();
        Permission::create($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-permission');
        $this->successNotify(__('site.permission_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updatePermission()
    {
        $validated = $this->validate();
        $this->permission->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-permission');
        $this->successNotify(__('site.permission_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-permission');
        $this->successNotify(__('site.permission_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeletePermission($arr)
    {
        $permissions = Permission::whereIn('id', $arr);
        $permissions->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-permission');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.permission_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
