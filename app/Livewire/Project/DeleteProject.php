<?php

namespace App\Livewire\Project;

use App\Traits\ProjectTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteProject extends Component
{
    use ProjectTrait;

    #[Locked]
    public ?string $id = null;

    #[Locked]
    public ?string $name = null;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteProject($this->id);
    }

    public function render()
    {
        $this->authorize('delete-project');

        return view('livewire.project.delete-project');
    }
}
