<?php

namespace App\Livewire\JobTitle;

use App\Traits\JobTitleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateJobTitle extends Component
{
    use JobTitleTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setJobTitle($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateJobTitle();
    }

    public function render()
    {
        $this->authorize('edit-job-title');

        return view('livewire.job-title.update-job-title');
    }
}
