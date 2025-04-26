<?php

namespace App\Livewire\Responsibility;

use App\Models\Responsibility;
use App\Traits\ResponsibilityTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListResponsibility extends Component
{
    use ResponsibilityTrait;

    #[On('refresh-list-responsibility')]
    public function render()
    {
        $this->authorize('view-responsibility');

        $responsibilities = Responsibility::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Responsibility::pluck('id')->toArray();

        return view('livewire.responsibility.list-responsibility', [
            'responsibilities' => $responsibilities,
        ]);
        
    }
}
