<?php

namespace App\Models;

use App\Enums\{LocationStatus, OriginStatus, OriginRecordStatus};
use App\Helpers\Helper;
use App\Traits\{LoggableTrait, UuidTrait};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasOne};
use Illuminate\Support\Collection;

class Origin extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    /** @var string */
    protected $table = 'origins';

    /** @var array */
    protected $fillable = [
        'project_id',
        'decision_num',
        'decision_date',
        'decision_type_id',
        'total_area_allocated',
        'total_area_coords',
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
    ];

    /** @var array */
    protected $casts = [
        'decision_date'   => 'integer',
        'location_status' => LocationStatus::class,
        'origin_status'   => OriginStatus::class,
        'record_status'   => OriginRecordStatus::class,
        'coordinates'     => 'array',
    ];

    /**
     * Return a formatted column value for data tables.
     */
    public function getColumnValue(string $key): mixed
    {
        return match ($key) {
            'basic_info'        => $this->formatOriginBasicInfo(),
            'area_info'         => $this->formatOriginAreaInfo(),
            'statuses_info' => $this->formatOriginStatusAndUsers(),
            'coordinates'       => $this->formatCoordinates($this->coordinates ?? []),
            'details'           => $this->formatOriginDetails($this->details ?? collect()),
            'services'          => $this->formatOriginServices($this->services ?? collect()),
            default             => e(data_get($this, $key)),
        };
    }

    /**
     * Format Tables.
     */

    protected function formatOriginBasicInfo(): string
    {
        $file = Helper::getFilePreviewDetails($this->decision_image);

        $headers = [
            __('site.project')          => $this->project?->name ?? '-',
            __('site.decision_type_id') => $this->decisionType?->name ?? '-',
            __('site.decision_num')     => $this->decision_num ?? '-',
            __('site.decision_date')    => $this->decision_date ?? '-',
            __('site.government')       => $this->government?->name ?? '-',
            __('site.city')             => $this->city?->name ?? '-',
            __('site.location')         => $this->location ?? '-',
            __('site.decision_image')   => $file ? '<img src="' . $file['iconUrl'] . '" alt="' . e($file['fileName']) . '" style="max-height:100px; display:inline-block"/>' : '-',
            __('site.notes')            => $this->notes ?? '-',

        ];

        $rows = [];
        foreach ($headers as $label => $value) {
            $rows[] = [$label, $value];
        }

        return $this->buildTable(
            headers: [],
            rows: $rows,
            headerBg: true,
            horizontal: true,
            // allowHtmlColumns: [7],
        );
    }

    protected function formatOriginAreaInfo(): string
    {
        $headers = [
            __('site.total_area_allocated')   => $this->total_area_allocated ?? '-',
            __('site.total_area_coords')      => $this->total_area_coords ?? '-',
            __('site.used_area')              => $this->used_area ?? '-',
            __('site.executing_entity_num')   => $this->executing_entity_num ?? '-',
            __('site.available_area')         => $this->available_area ?? '-',
            __('site.vacant_buildings')       => $this->vacant_buildings ?? '-',
            __('site.remaining_area')         => $this->remaining_area ?? '-',
        ];

        // Turn key/value into rows: Label | Value
        $rows = [];
        foreach ($headers as $label => $value) {
            $rows[] = [$label, $value];
        }

        return $this->buildTable(
            headers: [],
            rows: $rows,
            headerBg: true,
            horizontal: true
        );
    }

    protected function formatOriginStatusAndUsers(): string
    {
        $headers = [
            __('site.location_status') => $this->formatStatus($this->location_status),
            __('site.origin_status')   => $this->formatStatus($this->origin_status),
            __('site.record_status')   => $this->formatStatus($this->record_status),
            // __('site.created_by')     => $this->createdBy?->name ?? '-',
            // __('site.revised_by')     => $this->revisedBy?->name ?? '-',
            // __('site.completed_by')   => $this->completedBy?->name ?? '-',
            // __('site.coordinated_by') => $this->coordinatedBy?->name ?? '-',
        ];

        // Convert key/value to table rows
        $rows = [];
        foreach ($headers as $label => $value) {
            $rows[] = [e($label), $value];
        }

        return $this->buildTable(
            headers: [],
            rows: $rows,
            headerBg: true,
            horizontal: true,
        );
    }

    protected function formatCoordinates(array $coordinates): string
    {
        if (empty($coordinates[0])) {
            return __('site.no_data_found');
        }

        $xValues = [];
        $yValues = [];
        foreach ($coordinates[0] as $pair) {
            $xValues[] = is_array($pair) && isset($pair[0]) ? number_format($pair[0], 4) : '-';
            $yValues[] = is_array($pair) && isset($pair[1]) ? number_format($pair[1], 4) : '-';
        }

        return $this->buildTable(
            headers: ['X', ...$xValues],
            rows: [
                ['Y', ...$yValues]
            ],
            headerBg: true,
        );
    }

    protected function formatOriginDetails(Collection $details): string
    {
        if ($details->isEmpty()) {
            return __('site.no_data_found');
        }

        $headers = [
            __('site.statement_id'),
            __('site.used_area'),
            __('site.unit_area'),
            __('site.number_of_buildings_executed'),
            __('site.number_of_units'),
            __('site.residential_units'),
            __('site.administrative_units'),
            __('site.commercial_units'),
            __('site.commercial_shops'),
            __('site.notes'),
        ];

        $rows = [];
        foreach ($details as $detail) {
            $rows[] = [
                $detail->statement->name ?? '-',
                $detail->used_area ?? '-',
                $detail->unit_area ?? '-',
                $detail->number_of_buildings_executed ?? '-',
                $detail->number_of_units ?? '-',
                $detail->residential_units ?? '-',
                $detail->administrative_units ?? '-',
                $detail->commercial_units ?? '-',
                $detail->commercial_shops ?? '-',
                $detail->note ?? '-',
            ];
        }

        return $this->buildTable(
            headers: $headers,
            rows: $rows,
            headerBg: true,
            horizontal: false
        );
    }

    protected function formatOriginServices(Collection $services): string
    {
        if ($services->isEmpty()) {
            return __('site.no_data_found');
        }

        $headers = [
            __('site.type_service_id'),
            __('site.count'),
            __('site.note'),
        ];

        $rows = [];
        foreach ($services as $service) {
            $rows[] = [
                $service->typeService->name ?? '-',
                $service->count ?? '-',
                $service->note ?? '-',
            ];
        }

        return $this->buildTable(
            headers: $headers,
            rows: $rows,
            headerBg: true,
            horizontal: false  // horizontal=false so headers are the columns
        );
    }


    /**
     * Format status enums into HTML label.
     */
    protected function formatStatus($status): string
    {
        return '<div class="' . $status->color() . '">' . $status->label() . '</div>';
    }

    /**
     * Generic HTML table builder.
     */
    private function buildTable(
        array $headers,
        array $rows,
        bool $headerBg = true,
        bool $horizontal = false,
        string $mode = 'auto'
    ): string {
        if ($horizontal && !empty($rows)) {
            if ($mode === 'auto') {
                $allTwoCols = collect($rows)->every(fn($row) => count($row) === 2);
                $mode = $allTwoCols ? 'collapse' : 'matrix';
            }

            if ($mode === 'collapse') {
                $labels = array_column($rows, 0);
                $values = array_column($rows, 1);
                $headers = $labels;
                $rows = [$values];
            } elseif ($mode === 'matrix') {
                $labels = array_column($rows, 0);
                $colCount = count($rows[0]) - 1;
                $headers = array_merge([''], range(1, $colCount));
            }
        }

        $html = '<div class="flex flex-col overflow-x-auto">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <table class="table-fixed min-w-full text-sm">';

        // Header
        if (!empty($headers)) {
            $html .= '<thead' . ($headerBg ? ' class="bg-gray-100"' : '') . '><tr>';
            foreach ($headers as $header) {
                $html .= '<th class="border px-4 py-2">' . $header . '</th>';
            }
            $html .= '</tr></thead>';
        }

        // Body
        $html .= '<tbody>';
        foreach ($rows as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td class="border px-4 py-2">' . $cell . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';

        $html .= '</table></div></div></div>';

        return $html;
    }



    /* =========================
       Relationships
       ========================= */

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

    public function decisionType(): BelongsTo
    {
        return $this->belongsTo(DecisionType::class);
    }
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function government(): BelongsTo
    {
        return $this->belongsTo(Government::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function lockedOrigin(): HasOne
    {
        return $this->hasOne(LockedOrigin::class);
    }
    public function details(): HasMany
    {
        return $this->hasMany(OriginDetail::class);
    }
    public function services(): HasMany
    {
        return $this->hasMany(OriginService::class);
    }

    public function isLocked(): bool
    {
        return $this->lockedOrigin()->exists();
    }

    /* =========================
       Scopes
       ========================= */

    public function scopeSearch($query, $search, $governmentId, $cityId, $projectIds = [], $decisionTypeIds = [])
    {
        return $query
            ->when($search, function ($q) use ($search) {
                $q->where(function ($inner) use ($search) {
                    $inner->where('total_area_allocated', 'like', "%{$search}%")
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
                        ->orWhereHas('createdBy', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('revisedBy', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('completedBy', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($governmentId, fn($q) => $q->whereHas('government', fn($q2) => $q2->where('id', $governmentId)))
            ->when($cityId, fn($q) => $q->whereHas('city', fn($q2) => $q2->where('id', $cityId)))
            ->when($projectIds, fn($q) => $q->whereHas('project', fn($q2) => $q2->whereIn('id', $projectIds)))
            ->when($decisionTypeIds, fn($q) => $q->whereHas('decisionType', fn($q2) => $q2->whereIn('id', $decisionTypeIds)));
    }

    public function scopeFilterByOriginStatus($query, $status)
    {
        return $query->when($status, fn($q) => $q->where('origin_status', $status));
    }

    public function scopeFilterByLocationStatus($query, $status)
    {
        return $query->when($status, fn($q) => $q->where('location_status', $status));
    }

    public function scopeFilterByRecordStatus($query, $status)
    {
        return $query->when($status, fn($q) => $q->where('record_status', $status));
    }
}
