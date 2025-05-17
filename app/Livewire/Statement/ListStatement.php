<?php

namespace App\Livewire\Statement;

use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListStatement extends Component
{
    use StatementTrait;

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-statement')]
    public function render()
    {
        $this->authorize('view-statement');

        return view('livewire.statement.list-statement', [
            'statements' => $this->listStatements(),
        ]);
    }
}
