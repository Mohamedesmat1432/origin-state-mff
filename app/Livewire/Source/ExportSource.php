<?php

namespace App\Livewire\Source;

use App\Exports\SourcesExport;
use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportSource extends Component
{
    use SourceTrait;

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
            $this->dispatch('refresh-list-source');
            $this->successNotify(__('site.source_exported'));
            return (new SourcesExport($this->search))->download('source.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-source');
        
        return view('livewire.source.export-source');
    }
}
