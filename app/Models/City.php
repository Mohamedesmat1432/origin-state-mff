<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'cities';

    protected $fillable = [
        'government_id', 
        'name_ar', 
        'name_en'
    ];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }

    public function government()
    {
        return $this->belongsTo(Government::class);
    }

    public function origins()
    {
        return $this->hasMany(Origin::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name_ar', 'like', "%{$search}%")
                ->orWhere('name_en', 'like', "%{$search}%");
        });
    }
}
