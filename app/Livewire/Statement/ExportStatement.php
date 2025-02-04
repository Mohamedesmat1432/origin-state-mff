<?php

namespace App\Livewire\Statement;

use App\Exports\StatementsExport;
use App\Traits\StatementTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportStatement extends Component
{
    use StatementTrait;

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
            $this->dispatch('refresh-list-statement');
            $this->successNotify(__('site.statement_exported'));
            return (new StatementsExport($this->search))->download('statement.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-statement');
        
        return view('livewire.statement.export-statement');
    }
}
