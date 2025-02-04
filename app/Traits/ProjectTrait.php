<?php

namespace App\Traits;

use App\Models\Project;
use Livewire\WithPagination;

trait ProjectTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Project $project;

    public $project_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:projects,name,' . $this->project_id,
        ];
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
        $this->dispatch('refresh-list-project');
        $this->successNotify(__('site.project_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateProject()
    {
        $validated = $this->validate();
        $this->project->update($validated);
        $this->dispatch('refresh-list-project');
        $this->successNotify(__('site.project_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        $this->dispatch('refresh-list-project');
        $this->successNotify(__('site.project_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteProject($arr)
    {
        $projects = Project::whereIn('id', $arr);
        $projects->delete();
        $this->dispatch('refresh-list-project');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.project_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
