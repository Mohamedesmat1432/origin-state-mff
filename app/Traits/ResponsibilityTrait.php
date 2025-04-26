<?php

namespace App\Traits;

use App\Models\Responsibility;
use Livewire\WithPagination;

trait ResponsibilityTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Responsibility $responsibility;

    public $name, $responsibility_id;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:responsibilities,name,' . $this->responsibility_id,
        ];
    }

    public function setResponsibility($id)
    {
        $this->responsibility = Responsibility::findOrFail($id);
        $this->responsibility_id = $this->responsibility->id;
        $this->name = $this->responsibility->name;
    }

    public function storeResponsibility()
    {
        $validated = $this->validate();
        Responsibility::create($validated);
        $this->dispatch('refresh-list-responsibility');
        $this->successNotify(__('site.responsibility_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateResponsibility()
    {
        $validated = $this->validate();
        $this->responsibility->update($validated);
        $this->dispatch('refresh-list-responsibility');
        $this->successNotify(__('site.responsibility_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteResponsibility($id)
    {
        $responsibility = Responsibility::findOrFail($id);
        $responsibility->delete();
        $this->dispatch('refresh-list-responsibility');
        $this->successNotify(__('site.responsibility_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteResponsibility($arr)
    {
        $responsibilitys = Responsibility::whereIn('id', $arr);
        $responsibilitys->delete();
        $this->dispatch('refresh-list-responsibility');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.responsibility_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
