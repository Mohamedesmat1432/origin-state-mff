<?php

namespace App\Enums;

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
            self::InProgress => 'rounded p-2 inline-block text-white bg-yellow-600',
            self::Revision => 'rounded p-2 inline-block text-white bg-green-500',
            self::Completed => 'rounded p-2 inline-block text-white bg-blue-500',
        };
    }
}
