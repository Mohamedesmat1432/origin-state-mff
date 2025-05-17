<?php

namespace App\Traits;

use App\Models\Project;
use Livewire\WithPagination;

trait ProjectTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Project $project;

    public ?string $project_id = null;
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
            'name' => 'required|string|max:255|unique:projects,name,' . $this->project_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'project_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listProjects()
    {
        $query = Project::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get();
        });

        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listProjects()->pluck('id')->toArray());
    }

    public function setProject($id)
    {
        $this->project = Project::findOrFail($id);
        $this->project_id = $this->project->id;
        $this->name = $this->project->name;
    }

    public function storeProject()
    {
        $validated = $this->validate();
        Project::create($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-project');
        $this->successNotify(__('site.project_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateProject()
    {
        $validated = $this->validate();
        $this->project->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-project');
        $this->successNotify(__('site.project_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-project');
        $this->successNotify(__('site.project_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteProject($arr)
    {
        $projects = Project::whereIn('id', $arr);
        $projects->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-project');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.project_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
