<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $roleManager = Role::create(['name' => 'Manager', 'guard_name' => 'web']);
        $roleEmployee = Role::create(['name' => 'Employee', 'guard_name' => 'web']);
        $roleAdmin->syncPermissions(Permission::all());
    }
}
