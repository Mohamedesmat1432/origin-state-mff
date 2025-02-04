<?php

namespace App\Livewire\Project;

use App\Exports\ProjectsExport;
use App\Traits\ProjectTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportProject extends Component
{
    use ProjectTrait;

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
            $this->dispatch('refresh-list-project');
            $this->successNotify(__('site.project_exported'));
            return (new ProjectsExport($this->search))->download('project.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-project');
        
        return view('livewire.project.export-project');
    }
}
