<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Government;
use App\Traits\SortSearchTrait;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListGovernment extends Component
{
    use SortSearchTrait, WithPagination;

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

    public function getCacheKey(): string
    {
        return 'government_list_cache_' . md5(json_encode([
            $this->filters,
            $this->sort,
            $this->page_element,
        ]));
    }

    public function listGovernments()
    {
        $query =  Government::search($this->filters['search'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC');

        cache()->remember($this->getCacheKey(), now()->addMinutes(10), function () use ($query) {
            return $query->get();
        });

        return $query->paginate($this->page_element);
    }

    public function render()
    {
        $this->authorize('view-government');

        return view('livewire.list-government', [
            'governments' => $this->listGovernments(),
        ]);
    }
}
