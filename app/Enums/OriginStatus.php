<?php

namespace App\Enums;

use App\Models\Origin;

enum OriginStatus: string
{
    case InProgress = 'inprogress';
    case Revision = 'revision';
    case Completed = 'completed';

    public function label(): string
    {
        return __('enums.origin_status.' . $this->value);
    }

    public function color(): string
    {
        return match($this) {
            self::InProgress => 'p-2 inline-block text-white bg-yellow-600',
            self::Revision => 'p-2 inline-block text-white bg-green-500',
            self::Completed => 'p-2 inline-block text-white bg-blue-500',
        };
    }

    public function count(): string
    {
        return match($this) {
            self::InProgress => Origin::filterByOriginStatus(self::InProgress)->count(),
            self::Revision => Origin::filterByOriginStatus(self::Revision)->count(),
            self::Completed => Origin::filterByOriginStatus(self::Completed)->count(),
        };
    }
}
