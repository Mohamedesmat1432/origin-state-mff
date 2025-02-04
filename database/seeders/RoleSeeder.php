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
        $roleAdmin = Role::create(['name' => 'Super Admin']);
        $roleManager = Role::create(['name' => 'Manager']);
        $roleEmployee = Role::create(['name' => 'Employee']);
        $roleAdmin->syncPermissions(Permission::all());
    }
}
