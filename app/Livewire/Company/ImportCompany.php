<?php

namespace App\Livewire\Company;

use App\Imports\CompanysImport;
use App\Traits\CompanyTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class ImportCompany extends Component
{
    use CompanyTrait, WithFileUploads;

    public $file;

    #[On('import-modal')]
    public function importModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->import_modal = true;
    }


    public function import(CompanysImport $import)
    {
        $this->validate(['file' => 'required|file|mimes:xlsx,xls,csv|max:1024']);
        try {
            $this->import_modal = false;
            $import->import($this->file->getRealPath());
            $this->dispatch('refresh-list-company');
            $this->successNotify(__('site.company_imported'));
            if(!empty($import->skippedRows)) {
                $this->errorNotify(json_encode($import->skippedRows));
            }
            return;
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    public function render()
    {
        $this->authorize('import-company');

        return view('livewire.company.import-company');
    }
}
