<?php

namespace App\Models;

use App\Enums\{LocationStatus, OriginStatus, OriginRecordStatus};
use App\Helpers\Helper;
use App\Traits\{LoggableTrait, UuidTrait};
use App\Observers\OriginObserver;
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
        // 'statement_id',
        'used_area',
        'executing_entity_num',
        'government_id',
        'city_id',
        'location',
        'location_status',
        'origin_status',
        'available_area',
        'vacant_buildings',
        'remaining_area',
        'notes',
        'decision_image',
        'created_by',
        'revised_by',
        'completed_by',
        'coordinates',
        'record_status',
        'coordinated_by',
        'sepated_services',
    ];

    protected $casts = [
        'decision_date' => 'integer',
        'location_status' => LocationStatus::class,
        'origin_status' => OriginStatus::class,
        'record_status' => OriginRecordStatus::class,
        'coordinates' =>  'array',
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
            'statement_id' => $this->statements?->pluck('name')->join(', '), // updated
            'government_id' => $this->government?->name,
            'city_id' => $this->city?->name,
            'location_status' => '<div class="' . $this->location_status->color() . '">' . $this->location_status->label() . '</div>',
            'origin_status' => '<div class="' . $this->origin_status->color() . '">' . $this->origin_status->label() . '</div>',
            'record_status' => '<div class="' . $this->record_status->color() . '">' . $this->record_status->label() . '</div>',
            'created_by' => $this->createdBy?->name ?? __('site.no_data_found'),
            'revised_by' => $this->revisedBy?->name ?? __('site.no_data_found'),
            'completed_by' => $this->completedBy?->name ?? __('site.no_data_found'),
            'coordinated_by' => $this->coordinatedBy?->name ?? __('site.no_data_found'),
            'notes' => $this->notes ?? __('site.no_data_found'),
            'sepated_services' => $this->sepated_services ?? __('site.no_data_found'),
            'coordinates' => $this->formatCoordinates($this->coordinates ?? []),
            'details' => $this->formatOriginDetails($this->details ?? []),
            'decision_image' => $file ? '<img src="' . $file['iconUrl'] . '" alt="' . e($file['fileName']) . '" style="max-height:100px; display: inline-block"/>' : __('site.no_data_found'),
            default => e(data_get($this, $key)),
        };
    }

    protected function formatCoordinates(array $coordinates): string
    {
        if (empty($coordinates)) {
            return __('site.no_coordinates');
        }

        $html = '<div class="overflow-x-auto col-span-3 grid grid-cols-subgrid gap-4">
                    <table class="table-fixed min-w-full text-sm text-center">
                    <tbody><tr>
                    <th class="border p-2 bg-gray-100">X</th>';
        // First row for X values
        foreach ($coordinates[0] ?? [] as $pair) {
            $x = is_array($pair) && isset($pair[0]) ? number_format($pair[0], 4) : '-';
            $html .= '<td class="border p-2">' . $x . '</td>';
        }

        $html .= '</tr><tr><th class="border p-2 bg-gray-100">Y</th>';

        // Second row for Y values
        foreach ($coordinates[0] ?? [] as $pair) {
            $y = is_array($pair) && isset($pair[1]) ? number_format($pair[1], 4) : '-';
            $html .= '<td class="border p-2">' . $y . '</td>';
        }

        $html .= '</tr></tbody></table></div>';

        return $html;
    }

    protected function formatOriginDetails($details): string
    {
        if ($details->isEmpty()) {
            return __('site.no_data_found');
        }

        $html = '<div class="overflow-x-auto col-span-3 grid grid-cols-subgrid gap-4">
                <table class="table-fixed min-w-full text-sm border text-center">
                    <thead>
                        <tr class="bg-gray-100">';

        // Table headers (translate if needed)
        $headers = [
            'unit_area' => __('site.unit_area'),
            'number_of_buildings_executed' => __('site.number_of_buildings_executed'),
            'number_of_units' => __('site.number_of_units'),
            'residential_units' => __('site.residential_units'),
            'administrative_units' => __('site.administrative_units'),
            'commercial_units' => __('site.commercial_units'),
            'commercial_shops' => __('site.commercial_shops'),
        ];

        foreach ($headers as $label) {
            $html .= '<th class="border p-2 whitespace-nowrap">' . e($label) . '</th>';
        }

        $html .= '</tr></thead><tbody>';

        foreach ($details as $detail) {
            $html .= '<tr>';
            foreach (array_keys($headers) as $key) {
                $html .= '<td class="border p-2 whitespace-nowrap">' . e($detail->$key ?? '-') . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table></div>';

        return $html;
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

    public function coordinatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'coordinated_by');
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

    public function statements()
    {
        return $this->belongsToMany(Statement::class);
    }

    public function government()
    {
        return $this->belongsTo(Government::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function isLocked()
    {
        return $this->lockedOrigin()->exists();
    }

    public function lockedOrigin()
    {
        return $this->hasOne(LockedOrigin::class);
    }

    public function details()
    {
        return $this->hasMany(OriginDetail::class);
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
                    ->orWhere('sepated_services', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%")
                    ->orWhereHas('createdBy', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('revisedBy', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('completedBy', fn($q) => $q->where('name', 'like', "%{$search}%"));
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
            'statements' => $statementIds,
            'decisionType' => $decisionTypeIds,
        ];

        foreach ($relations as $relation => $ids) {
            $query->when(!empty($ids), function ($q) use ($relation, $ids) {
                $q->whereHas($relation, function ($q2) use ($ids) {
                    $q2->whereIn('id', $ids);
                });
            });
        }

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

    public function scopeFilterByRecordStatus($query, $status)
    {
        return $query->when($status, function ($query) use ($status) {
            $query->where('record_status', $status);
        });
    }
}
