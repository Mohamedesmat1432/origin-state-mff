<?php

namespace App\Livewire\Source;

use App\Imports\SourcesImport;
use App\Traits\SourceTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class ImportSource extends Component
{
    use SourceTrait, WithFileUploads;

    public $file;

    #[On('import-modal')]
    public function importModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->import_modal = true;
    }


    public function import(SourcesImport $import)
    {
        $this->validate(['file' => 'required|file|mimes:xlsx,xls,csv|max:1024']);
        try {
            $this->import_modal = false;
            $import->import($this->file->getRealPath());
            $this->dispatch('refresh-list-source');
            $this->successNotify(__('site.source_imported'));
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
        $this->authorize('import-source');

        return view('livewire.source.import-source');
    }
}
