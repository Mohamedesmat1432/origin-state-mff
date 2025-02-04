<?php

namespace App\Livewire\Source;

use App\Models\Source;
use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListSource extends Component
{
    use SourceTrait;

    #[On('refresh-list-source')]
    public function render()
    {
        $this->authorize('view-source');

        $sources = Source::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Source::pluck('id')->toArray();

        return view('livewire.source.list-source', [
            'sources' => $sources,
        ]);
    }
}
