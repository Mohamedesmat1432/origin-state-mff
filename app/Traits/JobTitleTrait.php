<?php

namespace App\Traits;

use App\Models\JobTitle;
use Livewire\WithPagination;

trait JobTitleTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?JobTitle $job_title;

    public $name, $job_title_id;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:job_titles,name,' . $this->job_title_id,
        ];
    }

    public function setJobTitle($id)
    {
        $this->job_title = JobTitle::findOrFail($id);
        $this->job_title_id = $this->job_title->id;
        $this->name = $this->job_title->name;
    }

    public function storeJobTitle()
    {
        $validated = $this->validate();
        JobTitle::create($validated);
        $this->dispatch('refresh-list-job-title');
        $this->successNotify(__('site.job_title_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateJobTitle()
    {
        $validated = $this->validate();
        $this->job_title->update($validated);
        $this->dispatch('refresh-list-job-title');
        $this->successNotify(__('site.job_title_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteJobTitle($id)
    {
        $job_title = JobTitle::findOrFail($id);
        $job_title->delete();
        $this->dispatch('refresh-list-job-title');
        $this->successNotify(__('site.job_title_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteJobTitle($arr)
    {
        $job_titles = JobTitle::whereIn('id', $arr);
        $job_titles->delete();
        $this->dispatch('refresh-list-job-title');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.job_title_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
