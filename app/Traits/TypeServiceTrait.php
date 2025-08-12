<?php

namespace App\Traits;

use App\Models\TypeService;
use Livewire\WithPagination;

trait TypeServiceTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?TypeService $type_service;

    public ?string $type_service_id = null;
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
            'name' => 'required|string|max:255|unique:type_services,name,' . $this->type_service_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'type_service_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listTypeServices()
    {
        $query = TypeService::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get(); // Get the results but don't paginate
        });
        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listTypeServices()->pluck('id')->toArray());
    }

    public function setTypeService($id)
    {
        $this->type_service = TypeService::findOrFail($id);
        $this->type_service_id = $this->type_service->id;
        $this->name = $this->type_service->name;
    }

    public function storeTypeService()
    {
        $validated = $this->validate();
        TypeService::create($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-type-service');
        $this->successNotify(__('site.type_service_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateTypeService()
    {
        $validated = $this->validate();
        $this->type_service->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-type-service');
        $this->successNotify(__('site.type_service_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteTypeService($id)
    {
        $type_service = TypeService::findOrFail($id);
        $type_service->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-type-service');
        $this->successNotify(__('site.type_service_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteTypeService($arr)
    {
        $type_services = TypeService::whereIn('id', $arr);
        $type_services->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-type-service');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.type_service_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
