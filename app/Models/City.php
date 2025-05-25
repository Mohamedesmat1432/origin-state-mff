<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'cities';

    protected $fillable = [
        'government_id',
        'name',
    ];

    public function government()
    {
        return $this->belongsTo(Government::class);
    }

    public function origins()
    {
        return $this->hasMany(Origin::class);
    }

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhereHas('government', fn($q) => $q->where('name', 'like', "%{$search}%"));
        });
    }
}
