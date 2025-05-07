<?php

namespace App\Enums;

use App\Models\Building;

enum BuildingStatus: string
{
    case Owned = 'owned';
    case Disputed = 'disputed';

    public function label(): string
    {
        return __('enums.building_status.' . $this->value);
    }

    public function color(): string
    {
        return match ($this) {
            self::Owned => 'p-2 inline-block text-white bg-yellow-600',
            self::Disputed => 'p-2 inline-block text-white bg-green-500',
        };
    }

    public function count(): string
    {
        return match ($this) {
            self::Owned => Building::filterByBuildingStatus(self::Owned)->count(),
            self::Disputed => Building::filterByBuildingStatus(self::Disputed)->count(),
        };
    }
}
