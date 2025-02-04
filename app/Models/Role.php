<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    // use UuidTrait;

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        });
    }
}
