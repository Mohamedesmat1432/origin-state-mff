<?php

namespace App\Livewire\Origin;

use App\Models\Origin;
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

        $origins = Origin::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Origin::pluck('id')->toArray();

        return view('livewire.origin.list-origin', [
            'origins' => $origins,
        ]);
    }
}
