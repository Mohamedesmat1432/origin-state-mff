<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use UuidTrait, LoggableTrait;

    protected $guard_name = 'web';

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        });
    }
}
