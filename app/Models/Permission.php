<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
{
    use UuidTrait;
    
    protected $guard_name = 'web';
    
    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        });
    }
}
