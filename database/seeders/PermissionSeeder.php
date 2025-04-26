<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-profile',
            'view-user',
            'create-user',
            'edit-user',
            'delete-user',
            'show-user',
            'restore-user',
            'force-delete-user',
            'bulk-delete-user',
            'force-bulk-delete-user',
            'view-chart-user',
            'view-role',
            'create-role',
            'edit-role',
            'delete-role',
            'show-role',
            'bulk-delete-role',
            'view-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'show-permission',
            'bulk-delete-permission',
            'view-trash-group-button',
            'view-backup-database',
            'view-department',
            'create-department',
            'edit-department',
            'delete-department',
            'show-department',
            'bulk-delete-department',
            'import-department',
            'export-department',
            'view-project',
            'create-project',
            'edit-project',
            'delete-project',
            'show-project',
            'bulk-delete-project',
            'import-project',
            'export-project',
            'view-chart-project',
            'view-decision-type',
            'create-decision-type',
            'edit-decision-type',
            'delete-decision-type',
            'bulk-delete-decision-type',
            'import-decision-type',
            'export-decision-type',
            'view-chart-decision-type',
            'view-statement',
            'create-statement',
            'edit-statement',
            'delete-statement',
            'bulk-delete-statement',
            'import-statement',
            'export-statement',
            'view-chart-statement',
            'view-origin',
            'create-origin',
            'edit-origin',
            'delete-origin',
            'bulk-delete-origin',
            'import-origin',
            'export-origin',
            'view-chart-origin',
            'view-company',
            'create-company',
            'edit-company',
            'delete-company',
            'bulk-delete-company',
            'import-company',
            'export-company',
            'view-chart-company',
            'delete-profile-account',
            'logout-profile-sessions',
            'view-government',
            'view-city',
            'view-job-title',
            'create-job-title',
            'edit-job-title',
            'delete-job-title',
            'bulk-delete-job-title',
            'view-responsibility',
            'create-responsibility',
            'edit-responsibility',
            'delete-responsibility',
            'bulk-delete-responsibility',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
