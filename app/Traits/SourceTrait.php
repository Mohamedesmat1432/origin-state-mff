<?php

namespace App\Traits;

use App\Models\Source;
use Livewire\WithPagination;

trait SourceTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Source $source;

    public $source_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:sources,name,' . $this->source_id,
        ];
    }

    public function setSource($id)
    {
        $this->source = Source::findOrFail($id);
        $this->source_id = $this->source->id;
        $this->name = $this->source->name;
    }

    public function storeSource()
    {
        $validated = $this->validate();
        Source::create($validated);
        $this->dispatch('refresh-list-source');
        $this->successNotify(__('site.source_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateSource()
    {
        $validated = $this->validate();
        $this->Source->update($validated);
        $this->dispatch('refresh-list-source');
        $this->successNotify(__('site.source_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteSource($id)
    {
        $source = Source::findOrFail($id);
        $source->delete();
        $this->dispatch('refresh-list-source');
        $this->successNotify(__('site.source_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteSource($arr)
    {
        $sources = Source::whereIn('id', $arr);
        $sources->delete();
        $this->dispatch('refresh-list-source');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.source_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
