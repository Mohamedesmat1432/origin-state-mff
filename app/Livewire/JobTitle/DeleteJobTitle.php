<?php

namespace App\Livewire\JobTitle;

use App\Traits\JobTitleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteJobTitle extends Component
{
    use JobTitleTrait;

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
        $this->deleteJobTitle($this->id);
    }

    public function render()
    {
        $this->authorize('delete-job-title');

        return view('livewire.job-title.delete-job-title');
    }
}
