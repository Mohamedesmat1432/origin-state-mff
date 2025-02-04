<?php

namespace App\Livewire\Project;

use App\Traits\ProjectTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateProject extends Component
{
    use ProjectTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setProject($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateProject();
    }

    public function render()
    {
        $this->authorize('edit-project');

        return view('livewire.project.update-project');
    }
}
