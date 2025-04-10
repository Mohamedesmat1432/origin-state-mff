<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Livewire\WithPagination;

trait RoleTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Role $role;
    public $role_id;
    public $name;
    public $permission;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:2|unique:roles,name,' . $this->role_id,
            'permission' => 'required|array',
        ];
    }

    public function permissions()
    {
        return Permission::pluck('name', 'name')->toArray();
    }

    public function setRole($id)
    {
        $this->role = Role::findOrFail($id);
        $this->role_id = $this->role->id;
        $this->name = $this->role->name;
        $this->permission = $this->role->permissions->pluck('name')->toArray();
    }

    public function storeRole()
    {
        $validated = $this->validate();
        $role = Role::create($validated);
        $role->givePermissionTo($this->permission);
        $this->dispatch('refresh-list-role');
        $this->successNotify(__('site.role_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateRole()
    {
        $validated = $this->validate();
        $this->role->update($validated);
        $this->role->syncPermissions($this->permission);
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
        $this->dispatch('refresh-list-role');
        $this->successNotify(__('site.role_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteRole()
    {
        $roles = Role::whereIn('id', $this->checkbox_arr);
        $roles->delete();
        $this->reset();
    }
}
