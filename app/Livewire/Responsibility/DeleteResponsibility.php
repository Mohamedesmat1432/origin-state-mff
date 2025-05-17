<?php

namespace App\Livewire\Responsibility;

use App\Traits\ResponsibilityTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteResponsibility extends Component
{
    use ResponsibilityTrait;

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
        $this->deleteResponsibility($this->id);
    }

    public function render()
    {
        $this->authorize('delete-responsibility');

        return view('livewire.responsibility.delete-responsibility');
    }
}
