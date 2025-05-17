<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Traits\ProjectTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListProject extends Component
{
    use ProjectTrait;

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-project')]
    public function render()
    {
        $this->authorize('view-project');

        return view('livewire.project.list-project', [
            'projects' =>  $this->listProjects(),
        ]);
    }
}
