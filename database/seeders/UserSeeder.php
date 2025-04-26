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
        $users = [
            [
                'name' => 'صابر إمام حسن',
                'email' => 'semam@gmail.com',
                'password' => Hash::make('Q@W#E$P@ssw0rd'),
                'national_number' => '27305200101798',
                'phone_number' => '01005015476',
            ],
            [
                'name' => 'رامى عبد الصادق',
                'email' => 'ramyabdelsadek@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'national_number' => '28508030300059',
                'phone_number' => '01007755011',
            ],
            [
                'name' => 'مارى عادل عبده',
                'email' => 'maryadel@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'national_number' => '29305302101625',
                'phone_number' => '01007429191',
            ],
            [
                'name' => 'عماد كمال',
                'email' => 'emadkamal@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'national_number' => '29006012606611',
                'phone_number' => '01012265196',
            ],
            [
                'name' => 'عاطف احمد',
                'email' => 'atefahmed@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'national_number' => '26712201204419',
                'phone_number' => '01061295796',
            ],
            [
                'name' => 'احمد عاطف',
                'email' => 'ahmedahtef@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'national_number' => '29203240103611',
                'phone_number' => '01225781732',
            ],
            [
                'name' => 'عبد الحميد محمد',
                'email' => 'abdelhamedmohamed@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'national_number' => '28501012702471',
                'phone_number' => '01008715259',
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }

        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('Q@W#E$P@ssw0rd'),
            'national_number' => '29606011210931',
            'phone_number' => '01153447675',
        ]);

        $role = Role::where('name', 'Super Admin')->first();
        if (!$role) {
            dd('Role not found');
        }
        $user->assignRole($role->name);
    }
}
