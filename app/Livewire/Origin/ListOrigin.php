<?php

namespace App\Livewire\Origin;

use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListOrigin extends Component
{
    use OriginTrait;

    #[On('refresh-list-origin')]
    public function render()
    {
        $this->authorize('view-origin');

        $origins = $this->originList();

        $this->checkbox_all = $this->originsCheckboxAll();

        return view('livewire.origin.list-origin', [
            'origins' => $origins,
        ]);
    }
}
