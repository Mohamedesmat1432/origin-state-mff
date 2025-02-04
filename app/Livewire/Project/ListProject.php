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

    #[On('refresh-list-project')]
    public function render()
    {
        $this->authorize('view-project');

        $projects = Project::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Project::pluck('id')->toArray();

        return view('livewire.project.list-project', [
            'projects' => $projects,
        ]);
    }
}
