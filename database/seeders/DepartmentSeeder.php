<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $departments = [
            'نظم المعلومات',
            'المالية',
            'الهندسية',
            'المكتب الفني',
            'الدعم',
            'البحوث',
            'الاستثمار',
            'القانونية',
        ];

        foreach ($departments as $department) {
            Department::create([
                'name' => $department,
            ]);
        }
    }
}
