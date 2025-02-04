<?php

namespace App\Livewire\Statement;

use App\Models\Statement;
use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListStatement extends Component
{
    use StatementTrait;

    #[On('refresh-list-statement')]
    public function render()
    {
        $this->authorize('view-statement');

        $statements = Statement::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Statement::pluck('id')->toArray();

        return view('livewire.statement.list-statement', [
            'statements' => $statements,
        ]);
    }
}
