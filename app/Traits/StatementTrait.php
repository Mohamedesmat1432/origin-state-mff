<?php

namespace App\Traits;

use App\Models\Statement;
use Livewire\WithPagination;

trait StatementTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Statement $statement;

    public ?string $statement_id = null;
    public ?string $name = null;


    public array $filters = [
        'search' => '',
    ];

    public array $sort = [
        'by' => 'id',
        'asc' => false,
    ];

    public function sortByField($field)
    {
        if ($field == $this->sort['by']) {
            $this->sort['asc'] = !$this->sort['asc'];
        }
        $this->sort['by'] = $field;
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:statements,name,' . $this->statement_id,
        ];
    }

    public function getCacheKey(): string
    {
        return 'statement_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listStatements()
    {
        $query = Statement::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get();
        });

        return $query->paginate($this->page_element);
    }

    public function checkboxDeleteAll()
    {
        $this->checkboxAll($this->listStatements()->pluck('id')->toArray());
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
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-statement');
        $this->successNotify(__('site.statement_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateStatement()
    {
        $validated = $this->validate();
        $this->statement->update($validated);
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-statement');
        $this->successNotify(__('site.statement_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteStatement($id)
    {
        $statement = Statement::findOrFail($id);
        $statement->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-statement');
        $this->successNotify(__('site.statement_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteStatement($arr)
    {
        $statements = Statement::whereIn('id', $arr);
        $statements->delete();
        cache()->forget($this->getCacheKey());
        $this->dispatch('refresh-list-statement');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.statement_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
