<?php

namespace App\Traits;

use App\Models\DecisionType;
use Livewire\WithPagination;

trait DecisionTypeTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?DecisionType $decision_type;

    public $decision_type_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:decision_types,name,' . $this->decision_type_id,
        ];
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
        $this->dispatch('refresh-list-decision-type');
        $this->successNotify(__('site.decision_type_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateDecisionType()
    {
        $validated = $this->validate();
        $this->decision_type->update($validated);
        $this->dispatch('refresh-list-decision-type');
        $this->successNotify(__('site.decision_type_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteDecisionType($id)
    {
        $decision_type = DecisionType::findOrFail($id);
        $decision_type->delete();
        $this->dispatch('refresh-list-decision-type');
        $this->successNotify(__('site.decision_type_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteDecisionType($arr)
    {
        $decision_types = DecisionType::whereIn('id', $arr);
        $decision_types->delete();
        $this->dispatch('refresh-list-decision-type');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.decision_type_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
