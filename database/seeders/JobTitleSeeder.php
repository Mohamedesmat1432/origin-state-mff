<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job_titles = [
            'مدير عام البنية التحتية وتأمين المعلومات',
            'مدخل بيانات',
            'مراجع',
        ];

        foreach ($job_titles as $job_title) {
            JobTitle::create([
                'name' => $job_title,
            ]);
        }
    }
}
