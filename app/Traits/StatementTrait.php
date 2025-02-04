<?php

namespace App\Traits;

use App\Models\Statement;
use Livewire\WithPagination;

trait StatementTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Statement $statement;

    public $statement_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:statements,name,' . $this->statement_id,
        ];
    }

    public function setStatement($id)
    {
        $this->statement = Statement::findOrFail($id);
        $this->statement_id = $this->statement->id;
        $this->name = $this->statement->name;
    }

    public function storeStatement()
    {
        $validated = $this->validate();
        Statement::create($validated);
        $this->dispatch('refresh-list-statement');
        $this->successNotify(__('site.statement_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateStatement()
    {
        $validated = $this->validate();
        $this->statement->update($validated);
        $this->dispatch('refresh-list-statement');
        $this->successNotify(__('site.statement_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteStatement($id)
    {
        $statement = Statement::findOrFail($id);
        $statement->delete();
        $this->dispatch('refresh-list-statement');
        $this->successNotify(__('site.statement_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteStatement($arr)
    {
        $statements = Statement::whereIn('id', $arr);
        $statements->delete();
        $this->dispatch('refresh-list-statement');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.statement_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
