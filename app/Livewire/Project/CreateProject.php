<?php

namespace App\Livewire\Project;

use App\Traits\ProjectTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateProject extends Component
{
    use ProjectTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeProject();
    }

    public function render()
    {
        $this->authorize('create-project');

        return view('livewire.project.create-project');
    }
}
