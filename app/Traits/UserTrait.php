<?php

namespace App\Traits;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

trait UserTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?User $user;
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $new_password;
    public $role;
    public $department_id;
    
    protected function rules()
    {
        $rules = [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
            'role' => 'required|exists:roles,name',
            'status' => 'required|boolean',
            'department_id' => 'required|string|exists:departments,id',
        ];

        if ($this->password) {
            $rules['password'] = 'required|string|min:8';
        }

        if ($this->new_password) {
            $rules['new_password'] = 'required|string|min:8';
        }

        return $rules;
    }

    public function departments()
    {
        return Department::pluck('name', 'id')->toArray();
    }

    public function roles()
    {
        return Role::pluck('name', 'name')->toArray();
    }

    public function setUser($id)
    {
        $this->user = User::with('roles')->findOrFail($id);
        $this->user_id = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->status = $this->user->status;
        $this->role = $this->user->roles->pluck('name')->toArray();
        $this->department_id = $this->user->department->id ?? '';
    }

    public function storeUser()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($this->password);
        $user = User::create($validated);
        $user->syncRoles($this->role);
        $this->dispatch('refresh-list-user');
        $this->successNotify(__('site.user_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateUser()
    {
        $validated = $this->validate();
        if ($this->new_password) {
            $validated['password'] = Hash::make($this->new_password);
        }
        $this->user->update($validated);
        $this->user->syncRoles($this->role);
        $this->dispatch('refresh-list-user');
        // $this->dispatch('refresh-navigation-menu');
        $this->successNotify(__('site.user_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->dispatch('refresh-list-user');
        $this->successNotify(__('site.user_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteUser($arr)
    {
        $users = User::withoutTrashed()->whereIn('id', $arr);
        $users->delete();
        $this->dispatch('refresh-list-user');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.user_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }

    public function restoreUser($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        $this->dispatch('refresh-list-user');
        $this->successNotify(__('site.user_restored'));
        $this->restore_modal = false;
        $this->reset();
    }

    public function forceDeleteUser($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        $this->dispatch('refresh-list-user');
        $this->successNotify(__('site.user_deleted'));
        $this->force_delete_modal = false;
        $this->reset();
    }

    public function forceBulkDeleteUser($arr)
    {
        $users = User::onlyTrashed()->whereIn('id', $arr);
        $users->forceDelete();
        $this->dispatch('refresh-list-user');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.user_delete_all'));
        $this->force_bulk_delete_modal = false;
        $this->reset();
    }
}
