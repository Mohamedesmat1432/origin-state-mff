<?php

namespace Database\Seeders;

use App\Models\Responsibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsibilities = [
            'رئيس فريق العمل',
            'بيانات الملكية',
            'البعد المكاني',
            'المديونيات',
            'العقود',
            'التعديلات',
            'التحصيل',
            'الشئون القانونية',
            'التقيم و التسعير',
        ];

        foreach ($responsibilities as $responsibility) {
            Responsibility::create([
                'name' => $responsibility,
            ]);
        }
    }
}
