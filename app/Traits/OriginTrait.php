<?php

namespace App\Traits;

use App\Models\City;
use App\Models\Government;
use App\Models\Origin;
use App\Models\Project;
use App\Models\Source;
use App\Models\Statement;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

trait OriginTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait, WithFileUploads;

    public ?Origin $origin;

    public $origin_id, $decision_num, $decision_date, $source_id, $project_id, $statement_id,
        $government_id, $city_id, $location, $area, $internal_incoming_num,
        $internal_incoming_date, $decision_image, $old_decision_image, $notes;

    protected function rules()
    {
        return [
            'decision_num' => 'required|numeric',
            'decision_date' => 'required|numeric',
            'source_id' => 'required|string|exists:sources,id',
            'project_id' => 'required|string|exists:projects,id',
            'statement_id' => 'required|string|exists:statements,id',
            'government_id' => 'required|string|exists:governments,id',
            'city_id' => 'required|string|exists:cities,id',
            'location' => 'nullable|string|max:255',
            'area' => 'required|numeric',
            'internal_incoming_num' => 'required|numeric',
            'internal_incoming_date' => 'required|date',
            'decision_image' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'notes' => 'nullable|string',
        ];
    }

    public function sources()
    {
        return Source::pluck('name', 'id')->toArray();
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

    public function setOrigin($id)
    {
        $this->origin = Origin::findOrFail($id);
        $this->origin_id = $this->origin->id;
        $this->decision_num = $this->origin->decision_num;
        $this->decision_date = $this->origin->decision_date;
        $this->source_id = $this->origin->source_id;
        $this->project_id = $this->origin->project_id;
        $this->statement_id = $this->origin->statement_id;
        $this->government_id = $this->origin->government_id;
        $this->city_id = $this->origin->city_id;
        $this->location = $this->origin->location;
        $this->area = $this->origin->area;
        $this->internal_incoming_num = $this->origin->internal_incoming_num;
        $this->internal_incoming_date = $this->origin->internal_incoming_date;
        $this->old_decision_image = $this->origin->decision_image;
        $this->notes = $this->origin->notes;
    }

    public function storeOrigin()
    {
        $validated = $this->validate();
        if($this->decision_image) {
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
