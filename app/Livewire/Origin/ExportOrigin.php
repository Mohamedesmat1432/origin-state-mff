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
        'statement_id',
        'government_id',
        'city_id',
        'total_area_allocated',
        'total_area_coords',
        'used_area',
        'executing_entity_num',
        'location',
        'available_area',
        'vacant_buildings',
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
    ];

    #[On('export-modal')]
    public function exportModal()
    {
        $this->resetForm();
        $this->export_modal = true;
    }

    public function selectAllColumns()
    {
        $this->selected_columns =  $this->checkbox_status ? $this->available_columns : [];
    }

    public function export()
    {
        try {
            // Ensure at least one column is selected
            if (empty($this->selected_columns)) {
                $this->errorNotify(__('site.please_select_at_least_one_column'));
                return;
            }

            $query = $this->getFilteredQuery();

            // Check if any records exist before exporting
            if ($query->count() === 0) {
                $this->errorNotify(__('site.no_data_found_for_export'));
                return;
            }

            $columns = $this->selected_columns ?: $this->available_columns;

            // Export and return
            $file = (new OriginsExport($query, $columns, $this->export_status))
                ->download('origins_export.' . $this->extension);

            $this->resetForm();

            $this->export_modal = false;
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_exported'));

            return $file;
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    protected function resetForm()
    {
        $this->reset([
            'selected_columns',
            'available_columns',
            'extension',
            'export_status',
            'checkbox_status',
            'filters',
        ]);
    }

    public function render()
    {
        $this->authorize('export-origin');

        return view('livewire.origin.export-origin');
    }
}
