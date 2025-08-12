<?php

namespace App\Livewire\TypeService;

use App\Models\TypeService;
use App\Traits\TypeServiceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListTypeService extends Component
{
    use TypeServiceTrait;

    protected $queryString = [
        'filters',
        'sort',
    ];

    #[On('refresh-list-type-service')]
    public function render()
    {
        $this->authorize('view-type-service');

        return view('livewire.type-service.list-type-service', [
            'type_services' => $this->listTypeServices(),
        ]);
    }
}
