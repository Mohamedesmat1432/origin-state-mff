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

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-responsibility')]
    public function render()
    {
        $this->authorize('view-responsibility');

        return view('livewire.responsibility.list-responsibility', [
            'responsibilities' => $this->listResponsibilities(),
        ]);
        
    }
}
