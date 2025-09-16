<?php

namespace App\Traits;

use App\Models\{
    City,
    DecisionType,
    Origin,
    LockedOrigin,
    EditRequestOrigin,
    Government,
    Project,
    Statement,
    TypeService,
    User
};
use App\Enums\{OriginStatus, LocationStatus, OriginRecordStatus};
use App\Notifications\OriginNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

trait OriginTrait
{
    use WithPagination, WithNotify, SortSearchTrait, ModalTrait, HasImageUpload;

    public ?Origin $origin;

    public ?string $origin_id = null, $project_id = null, $decision_type_id = null,
        $government_id = null, $city_id = null,
        $created_by = null, $revised_by = null, $completed_by = null, $coordinated_by = null,
        $decision_num = null, $location = null, $notes = null,
        $total_area_allocated = null, $total_area_coords = null,
        $used_area = null, $available_area = null, $remaining_area = null, $sepated_services = null;

    public ?int $decision_date = null, $executing_entity_num = null, $vacant_buildings = null;

    public mixed $origin_status = 'inprogress', $location_status = 'accept', $record_status = 'no';

    public $decision_image = null, $old_decision_image = null;

    public bool $show_filters = false;

    public $coordinates = [];

    public array $details = [];
    public array $services = [];

    public function recalculateRemainingArea()
    {
        $used_area_details = collect($this->details ?? [])->sum('used_area');
        $used_area_services = collect($this->services ?? [])->sum('used_area');
        $this->used_area = $used_area_details + $used_area_services;
        $this->remaining_area = max(0, $this->total_area_allocated - $this->used_area);
        $this->available_area = $this->remaining_area;
    }


    public array $relations = [
        'decisionType',
        'lockedOrigin',
        'project',
        'government',
        'city',
        'createdBy',
        'revisedBy',
        'completedBy',
        'coordinatedBy',
        'details',
        'services',
    ];

    public array $filters = [
        'search' => '',
        'government_id' => '',
        'city_id' => '',
        'project_ids' => [],
        'decision_type_ids' => []
    ];

    public array $enums = [
        'origin_status' => '',
        'location_status' => '',
        'record_status' => '',
    ];

    public array $sort = [
        'by' => 'id',
        'asc' => false,
    ];

    public string $map_government = '';
    public string $map_city = '';

    public function resualtFilters()
    {
        return [
            [
                'value' => $this->filters['search'],
                'label' => $this->filters['search'],
                'clear' => "filters.search",
                'isArray' => false
            ],
            [
                'value' => $this->filters['government_id'],
                'label' => Government::find($this->filters['government_id'])?->name,
                'clear' => "filters.government_id",
                'isArray' => false
            ],
            [
                'value' => $this->filters['city_id'],
                'label' => City::find($this->filters['city_id'])?->name,
                'clear' => "filters.city_id",
                'isArray' => false
            ],
            [
                'value' => $this->filters['decision_type_ids'],
                'label' => json_encode(
                    DecisionType::whereIn('id', $this->filters['decision_type_ids'])->pluck('name')->values()->all(),
                    JSON_UNESCAPED_UNICODE
                ),
                'clear' => "filters.decision_type_ids",
                'isArray' => true
            ],
            [
                'value' => $this->filters['project_ids'],
                'label' => json_encode(
                    Project::whereIn('id', $this->filters['project_ids'])->pluck('name')->values()->all(),
                    JSON_UNESCAPED_UNICODE
                ),
                'clear' => "filters.project_ids",
                'isArray' => true
            ],
            [
                'value' => $this->enums['origin_status'],
                'label' => OriginStatus::tryFrom($this->enums['origin_status'])?->label(),
                'clear' => "enums.origin_status",
                'isArray' => false
            ],
            [
                'value' => $this->enums['location_status'],
                'label' => LocationStatus::tryFrom($this->enums['location_status'])?->label(),
                'clear' => "enums.location_status",
                'isArray' => false
            ],
            [
                'value' => $this->enums['record_status'],
                'label' => OriginRecordStatus::tryFrom($this->enums['record_status'])?->label(),
                'clear' => "enums.record_status",
                'isArray' => false
            ],
        ];
    }

    public function sortByField($field)
    {
        $this->sort['asc'] = $field === $this->sort['by'] ? !$this->sort['asc'] : false;
        $this->sort['by'] = $field;
        $this->resetPage();
    }

    public function toggleFilters(): void
    {
        $this->show_filters = !$this->show_filters;
    }

    public function clearFilters(): void
    {
        $this->reset(['filters', 'sort', 'enums']);
        $this->resetPage();
    }

    protected function rules(): array
    {
        return [
            'project_id' => 'required|string|exists:projects,id',
            'decision_num' => 'required|numeric',
            'decision_date' => 'required|digits:4|integer|min:1901|max:' . date('Y'),
            'decision_type_id' => 'required|string|exists:decision_types,id',
            'total_area_allocated' => 'required|numeric',
            'total_area_coords' => 'required|numeric',
            'executing_entity_num' => 'required|numeric',
            'used_area' => 'required|numeric',
            'government_id' => 'required|string|exists:governments,id',
            'city_id' => 'required|string|exists:cities,id',
            'location' => 'nullable|string|max:500',
            'location_status' => 'required|in:accept,good,very_good,excellent',
            'available_area' => 'required|numeric',
            'vacant_buildings' => 'required|numeric',
            'remaining_area' => 'required|numeric',
            'decision_image' => 'nullable|file|max:5120|mimes:pdf,jpg,jpeg,png,xlsx,doc,docx,csv,odt,xls,webp',
            'notes' => 'nullable|string',
            'origin_status' => 'required|in:inprogress,revision,completed',
            'record_status' => 'required|in:yes,no',
            'details.*.statement_id' => 'required|string',
            'details.*.used_area' => 'nullable|numeric',
            'details.*.unit_area' => 'nullable|numeric',
            'details.*.number_of_buildings_executed' => 'nullable|numeric',
            'details.*.number_of_units' => 'nullable|numeric',
            'details.*.residential_units' => 'nullable|numeric',
            'details.*.administrative_units' => 'nullable|numeric',
            'details.*.commercial_units' => 'nullable|numeric',
            'details.*.commercial_shops' => 'nullable|numeric',
            'details.*.note' => 'nullable|string|max:500',
            'services.*.type_service_id' => 'required|string',
            'services.*.count' => 'required|numeric',
            'services.*.used_area' => 'nullable|numeric',
            'services.*.note' => 'nullable|string|max:500',
        ];
    }

    public function addDetail()
    {
        $this->details[] = [
            'statement_id' => null,
            'used_area' => 0,
            'unit_area' => 0,
            'number_of_buildings_executed' => 0,
            'number_of_units' => 0,
            'residential_units' => 0,
            'administrative_units' => 0,
            'commercial_units' => 0,
            'commercial_shops' => 0,
            'note' => '',
        ];
    }

    public function addService()
    {
        $this->services[] = [
            'type_service_id' => null,
            'count' => 0,
            'used_area' => 0,
            'note' => '',
        ];
    }

    public function removeDetail($index)
    {
        unset($this->details[$index]);
        $this->details = array_values($this->details);
        $this->recalculateRemainingArea();
    }

    public function removeService($index)
    {
        unset($this->services[$index]);
        $this->services = array_values($this->services);
    }

    public function getFilteredQuery()
    {
        return Origin::with($this->relations)
            ->search(...array_values($this->filters))
            ->filterByOriginStatus($this->enums['origin_status'])
            ->filterByLocationStatus($this->enums['location_status'])
            ->filterByRecordStatus($this->enums['record_status'])
            ->latest()
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');
    }

    public function getCacheKey(): string
    {
        return 'origin_list_cache_' . md5(json_encode([
            $this->filters,
            $this->enums,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function notifyUsers($origin, $action, $action_by)
    {
        $users = User::where('email', 'like', '%@mff.gov.eg')->get();

        foreach ($users as $user) {
            $user->notify(new OriginNotification($origin, auth()->user(), $action, $action_by));
        }
    }

    public function originList()
    {
        $query = $this->getFilteredQuery();

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get();
        });

        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->originList()->pluck('id')->toArray());
    }

    public function originsCount(): int
    {
        return Origin::count();
    }

    public function getDropdownOptions(string $model, string $column = 'name'): array
    {
        return $model::pluck($column, 'id')->toArray();
    }

    public function projects()
    {
        return $this->getDropdownOptions(Project::class);
    }
    public function typeServices()
    {
        return $this->getDropdownOptions(TypeService::class);
    }
    public function decisionTypes()
    {
        return $this->getDropdownOptions(DecisionType::class);
    }
    public function statements()
    {
        return $this->getDropdownOptions(Statement::class);
    }
    public function governments()
    {
        return $this->getDropdownOptions(Government::class);
    }

    public function cities(): array
    {
        $govId = $this->government_id ?? $this->filters['government_id'];
        return City::where('government_id', $govId)->pluck('name', 'id')->toArray();
    }

    public function updatedGovernmentId()
    {
        $this->city_id = null;
        $this->cities();
    }

    public function updatedFiltersGovernmentId()
    {
        $this->filters['city_id'] = null;
        $this->cities();
    }

    public function showOrigin($id)
    {
        $this->origin = Origin::with($this->relations)->findOrFail($id);

        // Keep original behavior (map_government set using city->name here)
        $this->map_government = $this->origin->city->name;
        $this->map_city = $this->origin->city->name;
        $this->coordinates = $this->origin->coordinates;
        $this->total_area_coords = $this->origin->total_area_coords;
    }

    public function setOrigin($id)
    {
        $this->origin = Origin::with($this->relations)->findOrFail($id);

        if ($this->origin->isLocked()) {
            return $this->errorNotify(__('site.origin_id_locked'));
        }

        foreach (
            [
                'origin_id',
                'project_id',
                'decision_num',
                'decision_date',
                'decision_type_id',
                'total_area_allocated',
                'total_area_coords',
                'executing_entity_num',
                'used_area',
                'government_id',
                'city_id',
                'location',
                'location_status',
                'origin_status',
                'available_area',
                'vacant_buildings',
                'remaining_area',
                'notes',
                'created_by',
                'revised_by',
                'completed_by',
                'coordinated_by',
                'record_status',
            ] as $field
        ) {
            $this->$field = $this->origin->$field ?? null;
        }

        $this->old_decision_image = $this->origin->decision_image;

        $this->details = $this->origin->details?->toArray();
        $this->services = $this->origin->services?->toArray();

        $this->map_government = $this->origin->government->name;
        $this->map_city = $this->origin->city->name;
    }

    public function storeOrigin()
    {
        $data = $this->validate();
        $this->changeUserByOriginStatus($data, $this->origin_status);

        if ($this->decision_image) {
            $data['decision_image'] = $this->storeImage($this->decision_image, 'decision-images');
        }

        DB::beginTransaction();
        try {
            $origin = Origin::create($data);

            $this->lockOriginIfNeeded($origin);
            $this->createOrUpdateDetails($origin);
            $this->createOrUpdateServices($origin);

            DB::commit();

            $this->clearCache();
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_created'));
            $this->create_modal = false;
            // $this->notifyUsers($origin, __('site.create_origin'), __('site.origin_created'));
            $this->reset();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('storeOrigin failed', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->errorNotify($e->getMessage());
        }
    }

    public function addCoordinates()
    {
        if ($this->origin->isLocked()) return $this->errorNotify(__('site.origin_id_locked'));

        $this->validate(['coordinates' => 'required|array']);

        DB::beginTransaction();
        try {
            $this->origin->update([
                'coordinates' => $this->coordinates,
                'total_area_coords' => $this->total_area_coords,
                'coordinated_by' => auth()->id()
            ]);

            DB::commit();

            $this->clearCache();
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_updated'));
            $this->add_coodinates = false;
            $this->notifyUsers($this->origin, __('site.add_coordinates_origin'), __('site.origin_updated'));
            $this->reset();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('addCoordinates failed', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->errorNotify($e->getMessage());
        }
    }

    public function updateOrigin()
    {
        if ($this->origin->isLocked()) return $this->errorNotify(__('site.origin_id_locked'));

        $data = $this->validate();
        $data['decision_image'] = $this->updateImage($this->decision_image, $this->old_decision_image, 'decision-images');

        // origin_status may be enum or string
        $statusValue = is_object($this->origin_status) && property_exists($this->origin_status, 'value')
            ? $this->origin_status->value
            : $this->origin_status;

        $this->changeUserByOriginStatus($data, $statusValue);

        DB::beginTransaction();
        try {
            $this->origin->update($data);

            $this->lockOriginIfNeeded($this->origin);
            $this->createOrUpdateDetails($this->origin);
            $this->createOrUpdateServices($this->origin);

            DB::commit();

            $this->clearCache();
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_updated'));
            $this->edit_modal = false;
            // $this->notifyUsers($this->origin, __('site.update_origin'), __('site.origin_updated'));
            $this->reset();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('updateOrigin failed', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->errorNotify($e->getMessage());
        }
    }

    private function createOrUpdateDetails($origin)
    {
        // This method is always called inside a transaction by callers.
        if ($origin) {
            $origin->details()->delete();
        }

        // Define numeric columns
        $numericFields = [
            'used_area',
            'unit_area',
            'number_of_buildings_executed',
            'number_of_units',
            'residential_units',
            'administrative_units',
            'commercial_units',
            'commercial_shops'
        ];

        foreach ($this->details as $detail) {
            $cleaned = collect($detail)->map(function ($value, $key) use ($numericFields) {
                if ($value === '') {
                    return in_array($key, $numericFields) ? 0 : null;
                }

                return is_string($value) ? trim($value) : $value;
            })->toArray();

            $origin->details()->create($cleaned);
        }
    }


    private function createOrUpdateServices($origin)
    {
        // This method is always called inside a transaction by callers.
        if ($origin) {
            $origin->services()->delete();
        }

        $numericFields = [
            'count',
            'used_area',
        ];

        foreach ($this->services as $service) {
            $cleaned = collect($service)->map(function ($value, $key) use ($numericFields) {
                if ($value === '') {
                    return in_array($key, $numericFields) ? 0 : null;
                }

                return is_string($value) ? trim($value) : $value;
            })->toArray();

            $origin->services()->create($cleaned);
        }
    }

    private function changeUserByOriginStatus(&$data, $status)
    {
        $map = [
            'inprogress' => 'created_by',
            'revision'   => 'revised_by',
            'completed'  => 'completed_by',
        ];

        if (isset($map[$status])) {
            $data[$map[$status]] = auth()->id();
        }
    }

    private function lockOriginIfNeeded($origin): void
    {
        $status = $origin->origin_status;

        // Support enum or string at runtime
        $value = is_object($status) && property_exists($status, 'value') ? $status->value : $status;

        if (in_array($value, [
            OriginStatus::Revision->value,
            OriginStatus::Completed->value,
        ], true)) {
            LockedOrigin::firstOrCreate(['origin_id' => $origin->id]);
        }
    }

    private function clearCache(): void
    {
        cache()->forget($this->getCacheKey());
    }

    public function deleteOrigin($id)
    {
        DB::beginTransaction();
        try {
            $origin = Origin::findOrFail($id);

            $this->deleteImage($origin->decision_image);
            $origin->details()->delete();
            $origin->services()->delete();
            // $this->notifyUsers($origin, __('site.delete_origin'), __('site.origin_deleted'));
            $origin->delete();

            DB::commit();

            $this->clearCache();
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_deleted'));
            $this->delete_modal = false;
            $this->reset();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('deleteOrigin failed', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->errorNotify($e->getMessage());
        }
    }

    public function bulkDeleteOrigin($ids)
    {
        DB::beginTransaction();
        try {
            $origins = Origin::whereIn('id', $ids)->get();

            $this->bulkDeleteImages(
                $origins->pluck('decision_image')->filter()->unique()->toArray()
            );

            $origins->each(function ($origin) {
                $origin->details()->delete();
                $origin->services()->delete();
                // $this->notifyUsers($origin, __('site.bulk_delete_origin'), __('site.origin_delete_all'));
            });

            Origin::whereIn('id', $ids)->delete();

            DB::commit();

            $this->clearCache();
            $this->dispatch('refresh-list-origin');
            $this->dispatch('checkbox-clear');
            $this->successNotify(__('site.origin_delete_all'));
            $this->bulk_delete_modal = false;
            $this->reset();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('bulkDeleteOrigin failed', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->errorNotify($e->getMessage());
        }
    }

    public function requestEdit($originId)
    {
        $origin = Origin::findOrFail($originId);

        if (!$origin->isLocked()) return $this->infoNotify(__('site.origin_is_editable'));

        if (EditRequestOrigin::where('origin_id', $originId)->where('status', 'pending')->exists()) {
            return $this->infoNotify(__('site.edit_request_is_found'));
        }

        DB::beginTransaction();
        try {
            EditRequestOrigin::create([
                'origin_id' => $originId,
                'user_id' => auth()->id(),
                'status' => 'pending',
            ]);

            DB::commit();

            $this->clearCache();
            $this->successNotify(__('site.edit_request_success'));
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('requestEdit failed', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            $this->errorNotify($e->getMessage());
        }
    }
}
