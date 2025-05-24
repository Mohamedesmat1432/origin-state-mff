<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait ModalTrait
{
    public $create_modal = false;
    public $create_exists_modal = false;
    public $edit_modal = false;
    public $show_modal = false;
    public $attach_modal = false;
    public $restore_modal = false;
    public $delete_modal = false;
    public $force_delete_modal = false;
    public $bulk_delete_modal = false;
    public $force_bulk_delete_modal = false;
    public $import_modal = false;
    public $export_modal = false;
    public $note_modal = false;
    public $add_coodinates = false;

    #[On('close-modal')]
    public function resetModal() {
        $this->reset([
            'create_modal',
            'create_exists_modal',
            'edit_modal',
            'show_modal',
            'attach_modal',
            'restore_modal',
            'delete_modal',
            'force_delete_modal',
            'bulk_delete_modal',
            'force_bulk_delete_modal',
            'import_modal',
            'export_modal',
            'note_modal',
            'add_coodinates',
        ]);
        $this->resetValidation();
    }
}
