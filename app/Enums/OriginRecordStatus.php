<?php

namespace App\Enums;

use App\Models\Origin;

enum OriginRecordStatus: string
{
    case Yes = 'yes';
    case No = 'no';

    public function label(): string
    {
        return __('enums.record_status.' . $this->value);
    }

    public function color(): string
    {
        return match($this) {
            self::Yes => 'p-2 inline-block text-white bg-green-500 rounded-lg text-sm',
            self::No => 'p-2 inline-block text-white bg-red-500 rounded-lg text-sm',
        };
    }

    public function count(): string
    {
        return match($this) {
            self::Yes => Origin::filterByRecordStatus(self::Yes)->count(),
            self::No => Origin::filterByRecordStatus(self::No)->count(),
        };
    }
}
