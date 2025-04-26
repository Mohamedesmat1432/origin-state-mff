<?php

namespace App\Livewire\DecisionType;

use App\Exports\DecisionTypesExport;
use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportDecisionType extends Component
{
    use DecisionTypeTrait;

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
            $this->dispatch('refresh-list-decision-type');
            $this->successNotify(__('site.decision_type_exported'));
            return (new DecisionTypesExport($this->search))->download('decision-type.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-DecisionType');
        
        return view('livewire.DecisionType.export-DecisionType');
    }
}
