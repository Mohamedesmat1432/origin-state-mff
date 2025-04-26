<?php

namespace App\Models;

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
        'decision_image',
        'notes',
    ];  

    protected $casts = [
        'decision_date' => 'integer',
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

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('decision_num', 'like', "%{$search}%")
                ->orWhere('decision_date', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('area', 'like', "%{$search}%")
                ->orWhere('internal_incoming_num', 'like', "%{$search}%")
                ->orWhere('internal_incoming_date', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%");
        });
    }}
