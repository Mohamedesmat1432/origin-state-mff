<?php

namespace App\Livewire\Company;

use App\Exports\CompanysExport;
use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportCompany extends Component
{
    use CompanyTrait;

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
            $this->dispatch('refresh-list-company');
            $this->successNotify(__('site.company_exported'));
            return (new CompanysExport($this->search))->download('company.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-company');
        
        return view('livewire.company.export-company');
    }
}
