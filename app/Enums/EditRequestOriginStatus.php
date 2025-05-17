<?php

namespace App\Enums;

use App\Models\EditRequestOrigin;
use App\Models\Origin;

enum EditRequestOriginStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';

    public function label(): string
    {
        return __('enums.edit_request_origin_status.' . $this->value);
    }

    public function color(): string
    {
        return match($this) {
            self::Pending => 'p-2 inline-block text-white bg-yellow-600 rounded-lg text-sm',
            self::Approved => 'p-2 inline-block text-white bg-green-500 rounded-lg text-sm',
            self::Rejected => 'p-2 inline-block text-white bg-red-500 rounded-lg text-sm',
        };
    }

    public function count(): string
    {
        return match($this) {
            self::Pending => EditRequestOrigin::filterByStatus(self::Pending)->count(),
            self::Approved => EditRequestOrigin::filterByStatus(self::Approved)->count(),
            self::Rejected => EditRequestOrigin::filterByStatus(self::Rejected)->count(),
        };
    }
}
