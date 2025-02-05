<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'origins';

    protected $fillable = [
        'decision_num',
        'decision_date',
        'source_id',
        'project_id',
        'statement_id',
        'government_id',
        'city_id',
        'location',
        'area',
        'internal_incoming_num',
        'internal_incoming_date',
        'decision_image',
        'notes',
    ];  

    protected $casts = [
        'decision_date' => 'integer',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
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
