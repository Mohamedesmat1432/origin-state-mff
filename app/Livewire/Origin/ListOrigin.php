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

    protected $queryString = [
        'filters',
        'sort',
        'enums',
        'show_filters',
    ];

    public function columns()
    {
        return [
            ['key' => 'basic_info', 'label' => __('site.basic_info')],
            ['key' => 'area_info', 'label' => __('site.area_info')],
            ['key' => 'status_info', 'label' => __('site.status_info')],
            ['key' => 'users_info', 'label' => __('site.users_info')],
            ['key' => 'details', 'label' => __('site.details')],
            ['key' => 'services', 'label' => __('site.sepated_services')],
            ['key' => 'coordinates', 'label' => __('site.coordinates')],
            ['key' => 'decision_image', 'label' => __('site.decision_image')],
            ['key' => 'notes', 'label' => __('site.notes')],
        ];
    }

    #[On('refresh-list-origin')]
    public function render()
    {
        $this->authorize('view-origin');

        return view('livewire.origin.list-origin', [
            'origins' => $this->originList(),
            'columns' => $this->columns(),
            'count_all' => Origin::count(),
        ]);
    }
}
