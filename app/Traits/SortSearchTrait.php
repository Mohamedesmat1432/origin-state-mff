<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait SortSearchTrait
{
    public string $search = '';

    public string $search_by_government = '';

    public string $search_by_city = '';

    public string $child_search = '';

    public string $date = '';

    public string $filter = '';

    public string $sort_by = 'id';

    public bool $sort_asc = false;

    public int $page_element = 25;

    public string $extension = 'xlsx';

    public bool $trash = false;

    public $status = false;

    public $checkbox_status = false;

    public $checkbox_arr = [];

    public $checkbox_all = [];

    protected $queryString = [
        'search',
        'search_by_government',
        'search_by_city',
        'child_search',
        'date',
        'filter',
        'sort_by',
        'sort_asc',
        'status',
        'trash',
    ];


    public function toggleStatus()
    {
        $this->status = !$this->status;
    }

    #[On('checkbox-clear')]
    public function checkboxClear()
    {
        $this->reset('checkbox_arr', 'checkbox_status');
    }

    public function checkboxAll()
    {
        $data = $this->checkbox_status ? $this->checkbox_all  : $this->checkbox_arr;

        if (count($this->checkbox_arr) < 1 || count($this->checkbox_arr) < count($data)) {
            $this->checkbox_arr = $data;
        } else {
            $this->checkboxClear();
        }
    }

    public function sortByField($field)
    {
        if ($field == $this->sort_by) {
            $this->sort_asc = !$this->sort_asc;
        }
        $this->sort_by = $field;
    }

    public function updatingPageElement()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSearchByGovernment()
    {
        $this->resetPage();
    }

    public function updatingSearchByCity()
    {
        $this->resetPage();
    }

    public function updatingChildSearch()
    {
        $this->resetPage();
    }

    public function updatingDate()
    {
        $this->resetPage();
    }

    public function updatingTrash()
    {
        $this->resetPage();
        $this->reset();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingUrl()
    {
        $this->resetPage();
    }
}
