<?php

namespace App\Livewire\DecisionType;

use App\Imports\DecisionTypesImport;
use App\Traits\DecisionTypeTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class ImportDecisionType extends Component
{
    use DecisionTypeTrait, WithFileUploads;

    public $file;

    #[On('import-modal')]
    public function importModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->import_modal = true;
    }


    public function import(DecisionTypesImport $import)
    {
        $this->validate(['file' => 'required|file|mimes:xlsx,xls,csv|max:1024']);
        try {
            $this->import_modal = false;
            $import->import($this->file->getRealPath());
            $this->dispatch('refresh-list-decision-type');
            $this->successNotify(__('site.decision_type_imported'));
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
        $this->authorize('import-decision-type');

        return view('livewire.decision-type.import-decision-type');
    }
}
