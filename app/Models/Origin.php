<?php

namespace App\Models;

use App\Enums\LocationStatus;
use App\Enums\OriginStatus;
use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'origins';

    protected $fillable = [
        'project_id',
        'decision_num',
        'decision_date',
        'decision_type_id',
        'total_area_allocated',
        'total_area_coords',
        'statement_id',
        'used_area',
        'executing_entity_num',
        'government_id',
        'city_id',
        'location',
        'location_status',
        'available_area',
        'vacant_buildings',
        'remaining_area',
        'notes',
        'origin_status',
        'decision_image',
        'user_id',
    ];
    
    protected $casts = [
        'decision_date' => 'integer',
        'location_status' => LocationStatus::class,
        'origin_status' => OriginStatus::class,
    ];

    public function decisionType()
    {
        return $this->belongsTo(DecisionType::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function statement()
    {
        return $this->belongsTo(Statement::class);
    }

    public function government()
    {
        return $this->belongsTo(Government::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('total_area_allocated', 'like', "%{$search}%")
                ->orWhere('total_area_coords', 'like', "%{$search}%")
                ->orWhere('decision_num', 'like', "%{$search}%")
                ->orWhere('decision_date', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('used_area', 'like', "%{$search}%")
                ->orWhere('executing_entity_num', 'like', "%{$search}%")
                ->orWhere('available_area', 'like', "%{$search}%")
                ->orWhere('vacant_buildings', 'like', "%{$search}%")
                ->orWhere('remaining_area', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhereHas('decisionType', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('project', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('statement', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('government', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('city', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        });
    }
}
