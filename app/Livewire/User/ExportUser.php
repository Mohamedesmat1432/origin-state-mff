<?php

namespace App\Livewire\User;

use App\Exports\UsersExport;
use App\Traits\UserTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportUser extends Component
{
    use UserTrait;

    public $selected_columns = [];

    public $export_status = false;

    public $available_columns = [
        'name',
        'email',
        'status',
        'department_id',
        'job_title_id',
        'national_number',
        'phone_number',
        'roles',
        'responsibility_id'
    ];

    #[On('export-modal')]
    public function exportModal()
    {
        $this->resetForm();
        $this->export_modal = true;
    }

    public function selectAllColumns()
    {
        $this->selected_columns =  empty($this->selected_columns) ? $this->available_columns : [];
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
            $file = (new UsersExport($query, $columns, $this->export_status))
                ->download('users_export.' . $this->extension);

            $this->resetForm();

            $this->export_modal = false;
            $this->dispatch('refresh-list-user');
            $this->successNotify(__('site.user_exported'));

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
            'filters',
        ]);
    }

    public function render()
    {
        $this->authorize('export-user');

        return view('livewire.user.export-user');
    }
}
