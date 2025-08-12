<?php

namespace App\Livewire\TypeService;

use App\Traits\TypeServiceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteTypeService extends Component
{
    use TypeServiceTrait;
    
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
        $this->deleteTypeService($this->id);
    }

    public function render()
    {
        $this->authorize('delete-type-service');

        return view('livewire.type-service.delete-type-service');
    }
}
