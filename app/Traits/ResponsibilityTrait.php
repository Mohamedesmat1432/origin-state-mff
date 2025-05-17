<?php

namespace App\Traits;

use App\Models\Responsibility;
use Livewire\WithPagination;

trait ResponsibilityTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Responsibility $responsibility;

    public ?string $responsibility_id = null;
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
            'name' => 'required|string|max:255|unique:responsibilities,name,' . $this->responsibility_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'responsibility_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listResponsibilities()
    {
        $query = Responsibility::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get();
        });

        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listResponsibilities()->pluck('id')->toArray());
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
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-responsibility');
        $this->successNotify(__('site.responsibility_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateResponsibility()
    {
        $validated = $this->validate();
        $this->responsibility->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-responsibility');
        $this->successNotify(__('site.responsibility_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteResponsibility($id)
    {
        $responsibility = Responsibility::findOrFail($id);
        $responsibility->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-responsibility');
        $this->successNotify(__('site.responsibility_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteResponsibility($arr)
    {
        $responsibilitys = Responsibility::whereIn('id', $arr);
        $responsibilitys->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-responsibility');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.responsibility_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
