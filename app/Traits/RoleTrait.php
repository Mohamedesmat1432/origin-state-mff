<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Livewire\WithPagination;

trait RoleTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Role $role;
    public ?string $role_id = null;
    public ?string $name = null;
    public array $permission_ids = [];

    public array $relations = ['permissions'];

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
            'name' => 'required|string|min:2|unique:roles,name,' . $this->role_id,
            'permission_ids' => 'required|array|exists:permissions,name',
        ];
    }

    public function permissions()
    {
        return Permission::orderBy('name', 'desc')->pluck('name', 'name')->toArray();
    }

    public function getCacheKey(): string
    {
        return 'role_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listRoles()
    {
        $query =  Role::with($this->relations)
            ->search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get();
        });

        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listRoles()->pluck('id')->toArray());
    }

    public function setRole($id)
    {
        $this->role = Role::with($this->relations)->findOrFail($id);
        $this->role_id = $this->role->id;
        $this->name = $this->role->name;
        $this->permission_ids = $this->role->permissions->pluck('name')->toArray();
    }

    public function storeRole()
    {
        $validated = $this->validate();
        $role = Role::create($validated);
        $role->givePermissionTo($this->permission_ids);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-role');
        $this->successNotify(__('site.role_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateRole()
    {
        $validated = $this->validate();
        $this->role->update($validated);
        $this->role->syncPermissions($this->permission_ids);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-role');
        // $this->dispatch('refresh-navigation-menu');
        $this->successNotify(__('site.role_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-role');
        $this->successNotify(__('site.role_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteRole()
    {
        $roles = Role::whereIn('id', $this->checkbox_arr);
        $roles->delete();
        cache()->forget($this->getCacheKey());
        $this->reset();
    }
}
