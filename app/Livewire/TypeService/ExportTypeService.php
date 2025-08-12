<?php

namespace App\Livewire\TypeService;

use App\Exports\TypeServicesExport;
use App\Traits\TypeServiceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportTypeService extends Component
{
    use TypeServiceTrait;

    #[On('export-modal')]
    public function exportModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->export_modal = true;
    }

    public function export()
    {
        try {
            $this->export_modal = false;
            $this->dispatch('refresh-list-type-service');
            $this->successNotify(__('site.type_service_exported'));
            return (new TypeServicesExport($this->search))->download('type-service.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-type-service');
        
        return view('livewire.type-service.export-type-service');
    }
}
