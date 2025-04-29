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
                'icon' => 'building-office',
                'role' => 'view-department',
            ],
            [
                'name' => 'roles',
                'value' => 'site.roles',
                'icon' => 'shield-check',
                'role' => 'view-role',
            ],
            [
                'name' => 'permissions',
                'value' => 'site.permissions',
                'icon' => 'key',
                'role' => 'view-permission',
            ],
            [
                'name' => 'decision.types',
                'value' => 'site.decision_types',
                'icon' => 'bolt',
                'role' => 'view-decision-type',
            ],
            [
                'name' => 'projects',
                'value' => 'site.projects',
                'icon' => 'briefcase',
                'role' => 'view-project',
            ],
            [
                'name' => 'statements',
                'value' => 'site.statements',
                'icon' => 'document-text',
                'role' => 'view-statement',
            ],
            [
                'name' => 'job.titles',
                'value' => 'site.job_titles',
                'icon' => 'receipt-percent',
                'role' => 'view-job-title',
            ],
            [
                'name' => 'responsibilities',
                'value' => 'site.responsibilities',
                'icon' => 'receipt-percent',
                'role' => 'view-responsibility',
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
                'icon' => 'globe-alt',
                'role' => 'view-origin',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.navigate-menu');
    }
}
