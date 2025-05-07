<?php

namespace App\Traits;

use App\Models\City;
use App\Models\Origin;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

trait OriginTrait
{
    use WithNotify;
    use SortSearchTrait;
    use WithPagination;
    use ModalTrait;
    use HasImageUpload;

    public ?Origin $origin;

    public ?string $origin_id = null;
    public ?string $project_id = null;
    public ?string $decision_type_id = null;
    public ?string $statement_id = null;
    public ?string $government_id = null;
    public ?string $city_id = null;
    public ?string $created_by = null;
    public ?string $revised_by = null;
    public ?string $completed_by = null;

    public ?string $decision_num = null;
    public ?int $decision_date = null;
    public mixed $origin_status = 'inprogress';
    public mixed $location_status = 'accept';

    public ?float $total_area_allocated = null;
    public ?float $total_area_coords = null;
    public ?float $used_area = null;
    public ?float $available_area = null;
    public ?float $remaining_area = null;

    public ?int $executing_entity_num = null;
    public ?int $vacant_buildings = null;
    public ?string $location = null;
    public ?string $notes = null;

    public $decision_image = null;
    public $old_decision_image = null;

    public array $relations = ['decisionType', 'project', 'statement', 'government', 'city', 'createdBy', 'revisedBy', 'completedBy'];

    #[Url()]
    public string $filter_origin_status = '';

    #[Url()]
    public string $filter_location_status = '';

    public array $selected_project_ids = [];
    public array $selected_statement_ids = [];
    public array $selected_decision_type_ids = [];

    protected function rules()
    {
        return [
            'project_id' => 'required|string|exists:projects,id',
            'decision_num' => 'required|numeric',
            'decision_date' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
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
        ];
    }

    public function updatingFilterOriginStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterLocationStatus()
    {
        $this->resetPage();
    }

    public function originsCheckboxAll()
    {
        return Origin::pluck('id')->toArray();
    }

    public function getFilteredQuery()
    {
        return Origin::with($this->relations)->search(
            $this->search,
            $this->government_id,
            $this->city_id,
            $this->selected_project_ids,
            $this->selected_statement_ids,
            $this->selected_decision_type_ids
        )
            ->filterByOriginStatus($this->filter_origin_status)
            ->filterByLocationStatus($this->filter_location_status)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC');
    }

    public function originList()
    {
        return $this->getFilteredQuery()->paginate($this->page_element);
    }

    public function originsCount()
    {
        return Origin::count();
    }

    public function getDropdownOptions(string $model, string $column = 'name'): array
    {
        return app("App\\Models\\$model")::pluck($column, 'id')->toArray();
    }

    public function projects()
    {
        return $this->getDropdownOptions('Project');
    }

    public function decisionTypes()
    {
        return $this->getDropdownOptions('DecisionType');
    }

    public function statements()
    {
        return $this->getDropdownOptions('Statement');
    }

    public function governments()
    {
        return $this->getDropdownOptions('Government');
    }

    public function cities()
    {
        return City::where('government_id', $this->government_id)->pluck('name', 'id')->toArray();
    }

    public function updatedGovernmentId()
    {
        $this->reset('city_id');
        $this->cities();
    }

    public function showOrigin($id)
    {
        $this->origin =  Origin::with($this->relations)->findOrFail($id);
    }

    public function setOrigin($id)
    {
        $this->origin = Origin::with($this->relations)->findOrFail($id);
        $fields = [
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
            'old_decision_image' => 'decision_image',
            'created_by',
            'revised_by',
            'completed_by'
        ];

        foreach ($fields as $key => $field) {
            $property = is_string($key) ? $key : $field;
            $this->$property = $this->origin->$field ?? null;
        }
    }

    public function storeOrigin()
    {
        $validated = $this->validate();
        $this->changeStatusByUser($validated, $this->origin_status);
        if ($this->decision_image) {
            $validated['decision_image'] = $this->storeImage($this->decision_image, 'decision-images');
        }
        $origin = Origin::create($validated);
        $this->dispatch('refresh-list-origin');
        $this->successNotify(__('site.origin_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateOrigin()
    {
        try {
            $validated = $this->validate();
            $validated['decision_image'] = $this->updateImage($this->decision_image, $this->old_decision_image, 'decision-images');
            $this->changeStatusByUser($validated, $this->origin_status->value);
            $this->origin->update($validated);
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_updated'));
            $this->edit_modal = false;
            $this->reset();
        } catch (\Exception $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    public function deleteOrigin($id)
    {
        try {
            $origin = Origin::findOrFail($id);
            $this->deleteImage($origin->decision_image);
            $origin->delete();
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_deleted'));
            $this->delete_modal = false;
            $this->reset();
        } catch (\Exception $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    public function bulkDeleteOrigin($arr)
    {
        try {
            $origins = Origin::whereIn('id', $arr);
            $images = $origins->pluck('decision_image')->filter()->unique();
            $this->bulkDeleteImages($images);
            $origins->delete();
            $this->dispatch('refresh-list-origin');
            $this->dispatch('checkbox-clear');
            $this->successNotify(__('site.origin_delete_all'));
            $this->bulk_delete_modal = false;
            $this->reset();
        } catch (\Exception $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    private function changeStatusByUser(&$validated, $status)
    {
        $statusUserMap = [
            'inprogress' => 'created_by',
            'revision'   => 'revised_by',
            'completed'  => 'completed_by',
        ];

        if (is_string($status) && array_key_exists($status, $statusUserMap)) {
            $field = $statusUserMap[$status];

            $validated[$field] = auth()->id();
        }
    }
}
