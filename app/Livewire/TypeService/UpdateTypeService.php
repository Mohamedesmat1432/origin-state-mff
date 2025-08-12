<?php

namespace App\Livewire\TypeService;

use App\Traits\TypeServiceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateTypeService extends Component
{
    use TypeServiceTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setTypeService($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateTypeService();
    }

    public function render()
    {
        $this->authorize('edit-type-service');

        return view('livewire.type-service.update-type-service');
    }
}
