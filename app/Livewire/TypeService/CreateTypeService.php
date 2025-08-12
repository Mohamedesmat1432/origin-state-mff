<?php

namespace App\Livewire\TypeService;

use App\Traits\TypeServiceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateTypeService extends Component
{
    use TypeServiceTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeTypeService();
    }

    public function render()
    {
        $this->authorize('create-type-service');

        return view('livewire.type-service.create-type-service');
    }
}
