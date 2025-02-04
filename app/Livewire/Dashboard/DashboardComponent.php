<?php

namespace App\Livewire\Dashboard;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Models\Department;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class DashboardComponent extends Component
{
    public function dashboardLinks()
    {
        return [
            [
                'name' => 'users',
                'value' => __('site.users'),
                'icon' => 'user-group',
                'role' => 'view-user',
                'bg' => 'bg-green-500',
                'hover' => 'hover:bg-green-600',
                'count' => User::count(),
            ],
            [
                'name' => 'roles',
                'value' => __('site.roles'),
                'icon' => 'lock-closed',
                'role' => 'view-role',
                'bg' => 'bg-blue-500',
                'hover' => 'hover:bg-blue-600',
                'count' => Role::count(),
            ],
            // [
            //     'name' => 'permissions',
            //     'value' => __('site.permissions'),
            //     'icon' => 'lock-open',
            //     'role' => 'view-permission',
            //     'bg' => 'bg-red-500',
            //     'hover' => 'hover:bg-red-600',
            //     'count' => Permission::count(),
            // ],
            // [
            //     'name' => 'departments',
            //     'value' => __('site.departments'),
            //     'icon' => 'squares-2x2',
            //     'role' => 'view-department',
            //     'bg' => 'bg-red-500',
            //     'hover' => 'hover:bg-red-600',
            //     'count' => Department::count(),
            // ],
        ];
    }

    public function render()
    {      
        return view('livewire.dashboard.dashboard-component');
    }
}
