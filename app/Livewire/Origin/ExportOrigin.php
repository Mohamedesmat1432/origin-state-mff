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

    #[On('export-modal')]
    public function exportModal()
    {
        $this->export_modal = true;
    }

    public function export()
    {
        try {
            $this->export_modal = false;
            $this->dispatch('refresh-list-origin');
            $this->successNotify(__('site.origin_exported'));
            return (new OriginsExport($this->getFilteredQuery()))->download('origin.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-origin');
        
        return view('livewire.origin.export-origin');
    }
}
