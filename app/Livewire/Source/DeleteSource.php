<?php

namespace App\Livewire\Source;

use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteSource extends Component
{
    use SourceTrait;

    #[Locked]
    public $id, $name;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteSource($this->id);
    }

    public function render()
    {
        $this->authorize('delete-source');

        return view('livewire.source.delete-source');
    }
}
