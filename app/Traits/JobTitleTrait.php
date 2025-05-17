<?php

namespace App\Traits;

use App\Models\JobTitle;
use Livewire\WithPagination;

trait JobTitleTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?JobTitle $job_title;

    public ?string $job_title_id = null;
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
            'name' => 'required|string|max:255|unique:job_titles,name,' . $this->job_title_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'job_title_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listJobTitles()
    {
        $query = JobTitle::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get(); // Get the results but don't paginate
        });
        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listJobTitles()->pluck('id')->toArray());
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
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-job-title');
        $this->successNotify(__('site.job_title_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateJobTitle()
    {
        $validated = $this->validate();
        $this->job_title->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-job-title');
        $this->successNotify(__('site.job_title_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteJobTitle($id)
    {
        $job_title = JobTitle::findOrFail($id);
        $job_title->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-job-title');
        $this->successNotify(__('site.job_title_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteJobTitle($arr)
    {
        $job_titles = JobTitle::whereIn('id', $arr);
        $job_titles->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-job-title');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.job_title_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
