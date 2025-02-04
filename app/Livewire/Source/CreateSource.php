<?php

namespace App\Livewire\Source;

use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateSource extends Component
{
    use SourceTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storesource();
    }

    public function render()
    {
        $this->authorize('create-source');

        return view('livewire.source.create-source');
    }
}
