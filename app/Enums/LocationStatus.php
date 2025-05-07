<?php

namespace App\Enums;

use App\Models\Origin;

enum LocationStatus: string
{
    case Accept = 'accept';
    case Good = 'good';
    case VeryGood = 'very_good';
    case Excellent = 'excellent';

    public function label(): string
    {
        return __('enums.location_status.' . $this->value);
    }

    public function color(): string
    {
        return match($this) {
            self::Accept => 'p-2 inline-block text-white bg-yellow-600',
            self::Good => 'p-2 inline-block text-white bg-green-500',
            self::VeryGood => 'p-2 inline-block text-white bg-blue-500',
            self::Excellent => 'p-2 inline-block text-white bg-purple-600',
        };
    }

    public function count(): string
    {
        return match($this) {
            self::Accept => Origin::filterBylocationStatus(self::Accept)->count(),
            self::Good => Origin::filterBylocationStatus(self::Good)->count(),
            self::VeryGood => Origin::filterBylocationStatus(self::VeryGood)->count(),
            self::Excellent => Origin::filterBylocationStatus(self::Excellent)->count(),
        };
    }
}
