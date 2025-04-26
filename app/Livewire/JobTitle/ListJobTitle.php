<?php

namespace App\Livewire\JobTitle;

use App\Models\JobTitle;
use App\Traits\JobTitleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListJobTitle extends Component
{
    use JobTitleTrait;

    #[On('refresh-list-job-title')]
    public function render()
    {
        $this->authorize('view-job-title');

        $job_titles = JobTitle::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = JobTitle::pluck('id')->toArray();

        return view('livewire.job-title.list-job-title', [
            'job_titles' => $job_titles,
        ]);
        
    }
}
