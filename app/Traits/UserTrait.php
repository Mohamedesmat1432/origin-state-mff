<?php

namespace App\Traits;

use App\Models\Department;
use App\Models\JobTitle;
use App\Models\Responsibility;
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
    public $department_id;
    public $job_title_id;
    public $national_number;
    public $phone_number;
    public $role_ids = [];
    public $responsibility_ids = [];
    public $check_all_roles = false;

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
            'national_number' => 'required|string|min:14|max:14|unique:users,national_number,' . $this->user_id,
            'phone_number' => 'required|string|min:10|max:15|unique:users,phone_number,' . $this->user_id,
            'role_ids' => 'required|array|exists:roles,name',
            'status' => 'required|boolean',
            'department_id' => 'required|string|exists:departments,id',
            'job_title_id' => 'required|string|exists:job_titles,id',
            'responsibility_ids' => 'nullable|array|exists:responsibilities,id',
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

    public function jobTitles()
    {
        return JobTitle::pluck('name', 'id')->toArray();
    }

    public function responsibilities()
    {
        return Responsibility::pluck('name', 'id')->toArray();
    }

    public function roles()
    {
        return Role::pluck('name')->toArray();
    }

    public function checkALlRole()
    {

        $this->role_ids = $this->check_all_roles ? $this->roles() : [];
    }

    public function setUser($id)
    {
        $this->user = User::with(['roles', 'responsibilities', 'department', 'jobTitle'])->findOrFail($id);
        $this->user_id = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->national_number = $this->user->national_number;
        $this->phone_number = $this->user->phone_number;
        $this->status = $this->user->status;
        $this->role_ids = $this->user->roles->pluck('name')->toArray();
        $this->department_id = $this->user->department->id ?? '';
        $this->job_title_id = $this->user->jobTitle->id ?? '';
        $this->responsibility_ids = $this->user->responsibilities->pluck('id')->toArray();
    }

    public function storeUser()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($this->password);
        $user = User::create($validated);
        $user->syncRoles($this->role_ids);
        if (!empty($this->responsibility_ids)) {
            $user->responsibilities()->sync($this->responsibility_ids);
        }
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
        $this->user->syncRoles($this->role_ids);
        if (!empty($this->responsibility_ids)) {
            $this->user->responsibilities()->sync($this->responsibility_ids);
        } else {
            $this->user->responsibilities()->detach(); // Remove all if none selected
        }
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
        $user = User::onlyTrashed()->with(['roles', 'responsibilities', 'department', 'jobTitle'])->findOrFail($id);
        $user->restore();
        $this->dispatch('refresh-list-user');
        $this->successNotify(__('site.user_restored'));
        $this->restore_modal = false;
        $this->reset();
    }

    public function forceDeleteUser($id)
    {
        $user = User::onlyTrashed()->with(['roles', 'responsibilities', 'department', 'jobTitle'])->findOrFail($id);
        $user->responsibilities()->detach();
        $user->forceDelete();
        $this->dispatch('refresh-list-user');
        $this->successNotify(__('site.user_deleted'));
        $this->force_delete_modal = false;
        $this->reset();
    }

    public function forceBulkDeleteUser($arr)
    {
        $users = User::onlyTrashed()->with(['roles', 'responsibilities', 'department', 'jobTitle'])->whereIn('id', $arr);
        $users->each(function ($user) {
            if ($user->responsibilities->isNotEmpty()) {
                $user->responsibilities()->detach();
            }

            $user->forceDelete();
        });
        $this->dispatch('refresh-list-user');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.user_delete_all'));
        $this->force_bulk_delete_modal = false;
        $this->reset();
    }
}
