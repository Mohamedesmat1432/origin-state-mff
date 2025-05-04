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

    public array $columns = [];

    public function mount()
    {
        $this->columns = [
            ['key' => 'id', 'label' => __('site.id')],
            ['key' => 'project_id', 'label' => __('site.project_id')],
            ['key' => 'decision_num', 'label' => __('site.decision_num')],
            ['key' => 'decision_date', 'label' => __('site.decision_date')],
            ['key' => 'decision_type_id', 'label' => __('site.decision_type_id')],
            ['key' => 'total_area_allocated', 'label' => __('site.total_area_allocated')],
            ['key' => 'total_area_coords', 'label' => __('site.total_area_coords')],
            ['key' => 'statement_id', 'label' => __('site.statement_id')],
            ['key' => 'used_area', 'label' => __('site.used_area')],
            ['key' => 'executing_entity_num', 'label' => __('site.executing_entity_num')],
            ['key' => 'government_id', 'label' => __('site.government_id')],
            ['key' => 'city_id', 'label' => __('site.city_id')],
            ['key' => 'location', 'label' => __('site.location')],
            ['key' => 'location_status', 'label' => __('site.location_status')],
            ['key' => 'available_area', 'label' => __('site.available_area')],
            ['key' => 'vacant_buildings', 'label' => __('site.vacant_buildings')],
            ['key' => 'remaining_area', 'label' => __('site.remaining_area')],
            ['key' => 'notes', 'label' => __('site.notes')],
            ['key' => 'origin_status', 'label' => __('site.origin_status')],
            ['key' => 'created_by', 'label' => __('site.created_by')],
            ['key' => 'revised_by', 'label' => __('site.revised_by')],
            ['key' => 'completed_by', 'label' => __('site.completed_by')],
        ];
    }

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
