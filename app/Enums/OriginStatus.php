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
}
