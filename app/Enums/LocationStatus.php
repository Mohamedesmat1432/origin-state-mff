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
}
