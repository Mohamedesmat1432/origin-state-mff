<?php

namespace App\Traits;

use App\Models\{City, DecisionType, Origin, LockedOrigin, EditRequestOrigin, Government, Project, Statement};
use App\Enums\{OriginStatus, LocationStatus, OriginRecordStatus};
use Livewire\WithPagination;

trait OriginTrait
{
    use WithPagination, WithNotify, SortSearchTrait, ModalTrait, HasImageUpload;

    public ?Origin $origin;
    public ?string $origin_id = null, $project_id = null, $decision_type_id = null, $statement_id = null;
    public ?string $government_id = null, $city_id = null, $created_by = null, $revised_by = null, $completed_by = null;
    public ?string $decision_num = null, $location = null, $notes = null;
    public ?int $decision_date = null, $executing_entity_num = null, $vacant_buildings = null;
    public ?string $total_area_allocated = null, $total_area_coords = null, $used_area = null;
    public ?string $available_area = null, $remaining_area = null;
    public mixed $origin_status = 'inprogress', $location_status = 'accept', $record_status = 'no';

    public $decision_image = null, $old_decision_image = null;

    public bool $show_filters = true;

    public $coordinates = [];

    public array $relations = [
        'decisionType',
        'lockedOrigin',
        'project',
        'statement',
        'government',
        'city',
        'createdBy',
        'revisedBy',
        'completedBy'
    ];

    public array $filters = [
        'search' => '',
        'government_id' => '',
        'city_id' => '',
        'project_ids' => [],
        'statement_ids' => [],
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
                'value' => $this->filters['statement_ids'],
                'label' => json_encode(
                    Statement::whereIn('id', $this->filters['statement_ids'])->pluck('name')->values()->all(),
                    JSON_UNESCAPED_UNICODE
                ),
                'clear' => "filters.statement_ids",
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
            'statement_id' => 'required|string|exists:statements,id',
            'government_id' => 'required|string|exists:governments,id',
            'city_id' => 'required|string|exists:cities,id',
            'location' => 'nullable|string|max:500',
            'location_status' => 'required|in:accept,good,very_good,excellent',
            'available_area' => 'required|numeric',
            'vacant_buildings' => 'required|numeric',
            'remaining_area' => 'required|numeric',
            'decision_image' => 'nullable|file|max:2048|mimes:pdf,jpg,jpeg,png,xlsx,doc,docx,csv,odt,xls,webp',
            'notes' => 'nullable|string',
            'origin_status' => 'required|in:inprogress,revision,completed',
            'record_status' => 'required|in:yes,no',
        ];
    }

    public function getFilteredQuery()
    {
        return Origin::with($this->relations)
            ->search(...array_values($this->filters))
            ->filterByOriginStatus($this->enums['origin_status'])
            ->filterByLocationStatus($this->enums['location_status'])
            ->filterByRecordStatus($this->enums['record_status'])
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

    public function originList()
    {
        $query = $this->getFilteredQuery();

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get(); // Get the results but don't paginate
        });

        return $query->paginate($this->page_element); // Return paginated results
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
                'statement_id',
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
                // 'coordinates',
                'record_status',
            ] as $field
        ) {
            $this->$field = $this->origin->$field ?? null;
        }

        $this->old_decision_image = $this->origin->decision_image;

        $this->map_government = $this->origin->government->name;
        $this->map_city = $this->origin->city->name;
    }

    public function storeOrigin()
    {
        // try {
        $data = $this->validate();
        $this->changeUserByOriginStatus($data, $this->origin_status);
        if ($this->decision_image) {
            $data['decision_image'] = $this->storeImage($this->decision_image, 'decision-images');
        }
        Origin::create($data);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-origin');
        $this->successNotify(__('site.origin_created'));
        $this->create_modal = false;
        $this->reset();
        // } catch (\Exception $e) {
        //     $this->errorNotify($e->getMessage());
        // }
    }

    public function addCoordinates()
    {
        if ($this->origin->isLocked()) return $this->errorNotify(__('site.origin_id_locked'));

        $this->validate(['coordinates' => 'required|array']);

        $this->origin->update([
            'coordinates' => $this->coordinates,
            'total_area_coords' => $this->total_area_coords,
        ]);

        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-origin');
        $this->successNotify(__('site.origin_updated'));
        $this->add_coodinates = false;
        $this->reset();
    }

    public function updateOrigin()
    {
        if ($this->origin->isLocked()) return $this->errorNotify(__('site.origin_id_locked'));

        $data = $this->validate();
        $data['decision_image'] = $this->updateImage($this->decision_image, $this->old_decision_image, 'decision-images');

        $this->changeUserByOriginStatus($data, $this->origin_status->value);
        $this->origin->fill($data);

        if ($this->origin->isDirty()) {
            $this->origin->save();


            if (in_array($this->origin->origin_status->value, [
                OriginStatus::Revision->value,
                OriginStatus::Completed->value
            ])) {
                LockedOrigin::firstOrCreate(['origin_id' => $this->origin->id]);
            }

            cache()->forget($this->getCacheKey());

            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_updated'));
        } else {
            $this->infoNotify(__('site.no_change_happen_for_data'));
        }

        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteOrigin($id)
    {
        try {
            $origin = Origin::findOrFail($id);
            $this->deleteImage($origin->decision_image);
            $origin->delete();
            cache()->forget($this->getCacheKey());

            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_deleted'));
            $this->delete_modal = false;
            $this->reset();
        } catch (\Exception $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    public function bulkDeleteOrigin($ids)
    {
        try {
            $origins = Origin::whereIn('id', $ids);
            $this->bulkDeleteImages($origins->pluck('decision_image')->filter()->unique()->toArray());
            $origins->delete();
            cache()->forget($this->getCacheKey());

            $this->dispatch('refresh-list-origin');
            $this->dispatch('checkbox-clear');
            $this->successNotify(__('site.origin_delete_all'));
            $this->bulk_delete_modal = false;
            $this->reset();
        } catch (\Exception $e) {
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

        EditRequestOrigin::create([
            'origin_id' => $originId,
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        cache()->forget($this->getCacheKey());

        $this->successNotify(__('site.edit_request_success'));
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
}
