<?php

namespace App\Livewire\Origin;

use App\Exports\OriginsExport;
use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportOrigin extends Component
{
    use OriginTrait;

    public $selected_columns = [];

    public $export_status = false;

    public $available_columns = [
        'decision_num',
        'decision_date',
        'project_id',
        'decision_type_id',
        'government_id',
        'city_id',
        'total_area_allocated',
        'total_area_coords',
        'used_area',
        'executing_entity_num',
        'location',
        'remaining_area',
        'notes',
        'location_status',
        'origin_status',
        'record_status',
        'decision_image',
        'created_by',
        'revised_by',
        'completed_by',
        'coordinated_by',
        'coordinates',
        'details',
        'services'
    ];

    #[On('export-modal')]
    public function exportModal()
    {
        $this->resetForm();
        $this->export_modal = true;
    }

    public function selectAllColumns()
    {
        $this->selected_columns = $this->checkbox_status ? $this->available_columns : [];
    }

    public function export()
    {
        try {
            if (empty($this->selected_columns)) {
                $this->errorNotify(__('site.please_select_at_least_one_column'));
                return;
            }

            $query = $this->getFilteredQuery()->with([
                'project',
                'decisionType',
                'government',
                'city',
                'createdBy',
                'revisedBy',
                'completedBy',
                'coordinatedBy',
                'details',
                'services'
            ]);

            if ($query->count() === 0) {
                $this->errorNotify(__('site.no_data_found_for_export'));
                return;
            }

            $columns = $this->selected_columns ?: $this->available_columns;

            return (new OriginsExport($query, $columns, $this->export_status))
                ->download('origins_export.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    protected function resetForm()
    {
        $this->reset([
            'selected_columns',
            'extension',
            'export_status',
            'checkbox_status',
            'filters',
        ]);
    }

    public function render()
    {
        $this->authorize('export-origin');

        return view('livewire.origin.export-origin', [
            'available_columns' => $this->available_columns,
        ]);
    }
}
