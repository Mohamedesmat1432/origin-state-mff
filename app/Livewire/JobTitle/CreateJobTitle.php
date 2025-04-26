<?php

namespace App\Livewire\JobTitle;

use App\Traits\JobTitleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateJobTitle extends Component
{
    use JobTitleTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeJobTitle();
    }

    public function render()
    {
        $this->authorize('create-job-title');

        return view('livewire.job-title.create-job-title');
    }
}
