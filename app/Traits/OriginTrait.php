<?php

namespace App\Traits;

use App\Models\City;
use App\Models\Government;
use App\Models\Origin;
use App\Models\Project;
use App\Models\DecisionType;
use App\Models\Statement;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

trait OriginTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait, WithFileUploads;

    public ?Origin $origin;

    public $origin_id, $project_id, $decision_num, $decision_date, $decision_type_id, $user_id,
        $statement_id, $total_area_allocated, $total_area_coords, $executing_entity_num, $used_area,
        $government_id, $city_id, $location,  $location_status = 'accept', $origin_status = 'inprogress',
        $available_area, $vacant_buildings, $remaining_area, $decision_image, $old_decision_image, $notes;

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
            'decision_image' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'notes' => 'nullable|string',
            'origin_status' => 'required|in:inprogress,revision,completed',
            'user_id' => 'required|string|exists:users,id',
        ];
    }

    public function decisionTypes()
    {
        return DecisionType::pluck('name', 'id')->toArray();
    }

    public function projects()
    {
        return Project::pluck('name', 'id')->toArray();
    }

    public function statements()
    {
        return Statement::pluck('name', 'id')->toArray();
    }

    public function governments()
    {
        return Government::pluck('name', 'id')->toArray();
    }

    public function cities()
    {
        return City::where('government_id', $this->government_id ?? $this->search_by_government)
            ->pluck('name', 'id')->toArray() ?? [];
    }

    public function originsCheckboxAll()
    {
        return Origin::pluck('id')->toArray();
    }

    public function originList()
    {
        return Origin::with(['decisionType', 'project', 'statement', 'government', 'city', 'user'])
            ->search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);
    }

    public function showOrigin($id)
    {
        $this->origin =  Origin::with(['decisionType', 'project', 'statement', 'government', 'city', 'user'])
            ->findOrFail($id);
    }

    public function setOrigin($id)
    {
        $this->origin = Origin::with(['decisionType', 'project', 'statement', 'government', 'city', 'user'])
            ->findOrFail($id);
        $this->origin_id = $this->origin->id;
        $this->project_id = $this->origin->project_id;
        $this->decision_num = $this->origin->decision_num;
        $this->decision_date = $this->origin->decision_date;
        $this->decision_type_id = $this->origin->decision_type_id;
        $this->total_area_allocated = $this->origin->total_area_allocated;
        $this->total_area_coords = $this->origin->total_area_coords;
        $this->executing_entity_num = $this->origin->executing_entity_num;
        $this->used_area = $this->origin->used_area;
        $this->statement_id = $this->origin->statement_id;
        $this->government_id = $this->origin->government_id;
        $this->city_id = $this->origin->city_id;
        $this->location = $this->origin->location;
        $this->location_status = $this->origin->location_status;
        $this->origin_status = $this->origin->origin_status;
        $this->available_area = $this->origin->available_area;
        $this->vacant_buildings = $this->origin->vacant_buildings;
        $this->remaining_area = $this->origin->remaining_area;
        $this->old_decision_image = $this->origin->decision_image;
        $this->notes = $this->origin->notes;
        $this->user_id = $this->origin->user_id;
    }

    public function storeOrigin()
    {
        $validated = $this->validate();

        $validated['user_id'] = auth()->user()->id;

        if ($this->decision_image) {
            $imagePath = $this->decision_image->store('decision-images', 'public');
            $validated['decision_image'] = $imagePath;
        }

        Origin::create($validated);
        $this->dispatch('refresh-list-origin');
        $this->successNotify(__('site.origin_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateOrigin()
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->user()->id;

        if ($this->decision_image) {
            if ($this->origin->decision_image) {
                Storage::disk('public')->delete($this->origin->decision_image);
            }
            $imagePath = $this->decision_image->store('decision-images', 'public');
        } else {
            $imagePath = $this->old_decision_image;
        }

        $validated['decision_image'] = $imagePath;

        $this->origin->update($validated);
        $this->dispatch('refresh-list-origin');
        $this->successNotify(__('site.origin_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteOrigin($id)
    {
        $origin = Origin::findOrFail($id);
        if ($origin->decision_image) {
            Storage::disk('public')->delete($origin->decision_image);
        }
        $origin->delete();
        $this->dispatch('refresh-list-origin');
        $this->successNotify(__('site.origin_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteOrigin($arr)
    {
        $origins = Origin::whereIn('id', $arr);
        foreach ($origins as $origin) {
            if ($origin->decision_image) {
                Storage::disk('public')->delete($origin->decision_image);
            }
        }
        $origins->delete();
        $this->dispatch('refresh-list-origin');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.origin_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
