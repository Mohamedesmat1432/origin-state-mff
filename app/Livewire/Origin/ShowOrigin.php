<?php

namespace App\Livewire\Origin;

use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowOrigin extends Component
{
    use OriginTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->showOrigin($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-origin');

        return view('livewire.origin.show-origin');
    }
}
