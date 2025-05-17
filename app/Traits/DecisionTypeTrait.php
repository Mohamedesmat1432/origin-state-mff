<?php

namespace App\Traits;

use App\Models\DecisionType;
use Livewire\WithPagination;

trait DecisionTypeTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?DecisionType $decision_type;

    public ?string $decision_type_id = null;
    public ?string $name = null;

    public array $filters = [
        'search' => '',
    ];

    public array $sort = [
        'by' => 'id',
        'asc' => false,
    ];

    public function sortByField($field)
    {
        if ($field == $this->sort['by']) {
            $this->sort['asc'] = !$this->sort['asc'];
        }
        $this->sort['by'] = $field;
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:decision_types,name,' . $this->decision_type_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'decision_type_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listDecisionTypes()
    {
        $query = DecisionType::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get(); // Get the results but don't paginate
        });
        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listDecisionTypes()->pluck('id')->toArray());
    }

    public function setDecisionType($id)
    {
        $this->decision_type = DecisionType::findOrFail($id);
        $this->decision_type_id = $this->decision_type->id;
        $this->name = $this->decision_type->name;
    }

    public function storeDecisionType()
    {
        $validated = $this->validate();
        DecisionType::create($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-decision-type');
        $this->successNotify(__('site.decision_type_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateDecisionType()
    {
        $validated = $this->validate();
        $this->decision_type->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-decision-type');
        $this->successNotify(__('site.decision_type_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteDecisionType($id)
    {
        $decision_type = DecisionType::findOrFail($id);
        $decision_type->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-decision-type');
        $this->successNotify(__('site.decision_type_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteDecisionType($arr)
    {
        $decision_types = DecisionType::whereIn('id', $arr);
        $decision_types->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-decision-type');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.decision_type_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
