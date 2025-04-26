<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecisionType extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'decision_types';

    protected $fillable = [
        'name'
    ];    

    public function origins()
    {
        return $this->hasMany(Origin::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%");
        });
    }}
