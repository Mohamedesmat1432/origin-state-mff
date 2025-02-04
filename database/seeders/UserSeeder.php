<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('Q@W#E$P@ssw0rd'),
        ]);

        $role = Role::where('name', 'Super Admin')->first();
        if (!$role) {
            dd('Role not found');
        }
        $user->assignRole($role->name);
    }
}
