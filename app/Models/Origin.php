<?php

namespace App\Models;

use App\Enums\LocationStatus;
use App\Enums\OriginStatus;
use App\Helpers\Helper;
use App\Observers\OriginObserver;
use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'created_by',
        'revised_by',
        'completed_by',
    ];

    protected $casts = [
        'decision_date' => 'integer',
        'location_status' => LocationStatus::class,
        'origin_status' => OriginStatus::class,
    ];

    // protected static function booted()
    // {
    //     static::observe(OriginObserver::class);
    // }

    public function getColumnValue(string $key): mixed
    {
        $file = Helper::getFilePreviewDetails($this->decision_image);

        return match ($key) {
            'project_id' => $this->project?->name,
            'decision_type_id' => $this->decisionType?->name,
            'statement_id' => $this->statement?->name,
            'government_id' => $this->government?->name,
            'city_id' => $this->city?->name,
            'created_by' => $this->createdBy?->name,
            'revised_by' => $this->revisedBy?->name,
            'completed_by' => $this->completedBy?->name,
            'location_status' => '<span class="rounded ' . $this->location_status->color() . '">' . $this->location_status->label() . '</span>',
            'origin_status' => '<span class="rounded ' . $this->origin_status->color() . '">' . $this->origin_status->label() . '</span>',
            'decision_image' => $file ? '<img src="' . $file['iconUrl'] . '" alt="' . e($file['fileName']) . '" style="max-height:100px;"/>' : '',
            default => e(data_get($this, $key)),
        };
    }

    // User actions
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function revisedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'revised_by');
    }

    public function completedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'completed_by');
    }

    // Other relationships
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

    public function scopeSearch($query, $search, $governmentId, $cityId, $projectIds = [], $statementIds = [], $decisionTypeIds = [])
    {
        // Basic column search
        $query->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('total_area_allocated', 'like', "%{$search}%")
                    ->orWhere('total_area_coords', 'like', "%{$search}%")
                    ->orWhere('decision_num', 'like', "%{$search}%")
                    ->orWhere('decision_date', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('used_area', 'like', "%{$search}%")
                    ->orWhere('executing_entity_num', 'like', "%{$search}%")
                    ->orWhere('available_area', 'like', "%{$search}%")
                    ->orWhere('vacant_buildings', 'like', "%{$search}%")
                    ->orWhere('remaining_area', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%");
            });
        });

        $query->when(!empty($governmentId), function ($q) use ($governmentId) {
            $q->whereHas('government', function ($q2) use ($governmentId) {
                $q2->where('id', $governmentId);
            });
        });

        $query->when(!empty($cityId), function ($q) use ($cityId) {
            $q->whereHas('city', function ($q2) use ($cityId) {
                $q2->where('id', $cityId);
            });
        });

        // Relation ID filters
        $relations = [
            'project' => $projectIds,
            'statement' => $statementIds,
            'decisionType' => $decisionTypeIds,
        ];

        foreach ($relations as $relation => $ids) {
            $query->when(!empty($ids), function ($q) use ($relation, $ids) {
                $q->whereHas($relation, function ($q2) use ($ids) {
                    $q2->whereIn('id', $ids);
                });
            });
        }

        // Optional: if you want to search relation names too
        $query->when($search, function ($query) use ($search) {
            $query->orWhereHas('government', fn($q) => $q->where('name', 'like', "%{$search}%"))
                ->orWhereHas('city', fn($q) => $q->where('name', 'like', "%{$search}%"))
                ->orWhereHas('project', fn($q) => $q->where('name', 'like', "%{$search}%"))
                ->orWhereHas('statement', fn($q) => $q->where('name', 'like', "%{$search}%"))
                ->orWhereHas('decisionType', fn($q) => $q->where('name', 'like', "%{$search}%"));
        });

        return $query;
    }

    public function scopeFilterByOriginStatus($query, $status)
    {
        return $query->when($status, function ($query) use ($status) {
            $query->where('origin_status', $status);
        });
    }

    public function scopeFilterByLocationStatus($query, $status)
    {
        return $query->when($status, function ($query) use ($status) {
            $query->where('location_status', $status);
        });
    }
}
