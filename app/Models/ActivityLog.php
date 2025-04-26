<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{
    use UuidTrait;
}
