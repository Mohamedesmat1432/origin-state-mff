<?php

// declare(strict_types=1);

namespace App\Livewire;

use Laravel\Jetstream\Http\Livewire\NavigationMenu;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class NavigateMenu extends NavigationMenu
{
    // protected $listeners = ['refresh-navigate-menu' => '$refresh'];
 
    public function dropdownLinks()
    {
        return [
            [
                'name' => 'profile.show',
                'value' => 'site.profile',
                'icon' => 'user',
                'role' => 'view-profile',
            ],
            [
                'name' => 'departments',
                'value' => 'site.departments',
                'icon' => 'squares-2x2',
                'role' => 'view-department',
            ],
            [
                'name' => 'roles',
                'value' => 'site.roles',
                'icon' => 'lock-closed',
                'role' => 'view-role',
            ],
            [
                'name' => 'permissions',
                'value' => 'site.permissions',
                'icon' => 'receipt-percent',
                'role' => 'view-permission',
            ],
            [
                'name' => 'sources',
                'value' => 'site.sources',
                'icon' => 'receipt-percent',
                'role' => 'view-source',
            ],
            [
                'name' => 'projects',
                'value' => 'site.projects',
                'icon' => 'receipt-percent',
                'role' => 'view-project',
            ],
            [
                'name' => 'statements',
                'value' => 'site.statements',
                'icon' => 'receipt-percent',
                'role' => 'view-statement',
            ],
            [
                'name' => 'backup',
                'value' => 'site.backup',
                'icon' => 'inbox-stack',
                'role' => 'view-backup-database',
            ],
        ];
    }

    public function responsiveLinks()
    {
        return [
            [
                'name' => 'users',
                'value' => 'site.users',
                'icon' => 'user-group',
                'role' => 'view-user',
            ],
            [
                'name' => 'origins',
                'value' => 'site.origins',
                'icon' => 'user-group',
                'role' => 'view-origin',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.navigate-menu');
    }
}
