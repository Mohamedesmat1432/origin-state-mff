<?php

namespace App\Enums;

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
            self::Accept => 'rounded p-2 inline-block text-white bg-yellow-600',
            self::Good => 'rounded p-2 inline-block text-white bg-green-500',
            self::VeryGood => 'rounded p-2 inline-block text-white bg-blue-500',
            self::Excellent => 'rounded p-2 inline-block text-white bg-purple-600',
        };
    }
}
