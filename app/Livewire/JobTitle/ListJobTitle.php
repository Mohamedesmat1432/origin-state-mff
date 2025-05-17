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

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-job-title')]
    public function render()
    {
        $this->authorize('view-job-title');

        return view('livewire.job-title.list-job-title', [
            'job_titles' => $this->listJobTitles(),
        ]);
        
    }
}
