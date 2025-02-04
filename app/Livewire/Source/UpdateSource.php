<?php

namespace App\Livewire\Source;

use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateSource extends Component
{
    use SourceTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setSource($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateSource();
    }

    public function render()
    {
        $this->authorize('edit-source');

        return view('livewire.source.update-source');
    }
}
