<?php

namespace App\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait LoggableTrait
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;
    protected static $logName = 'default';

    protected static $logAttributesToIgnore = ['updated_at'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return class_basename($this) . " has been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(property_exists($this, 'logName') ? $this->logName : 'default')
            ->logOnly($this->getFillable())
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
