<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            DepartmentSeeder::class,
            JobTitleSeeder::class,
            ResponsibilitySeeder::class,
            UserSeeder::class,
            GovernmentSeeder::class,
            // CitySeeder::class,
        ]);
    }
}
