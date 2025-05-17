<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait SortSearchTrait
{
    public string $search = '';

    public string $date = '';

    public int $page_element = 10;

    public string $extension = 'xlsx';

    public bool $trash = false;
    
    public $checkbox_status = false;
    
    public $checkbox_arr = [];

    public function toggleTrash()
    {
        $this->trash = !$this->trash;
        $this->checkboxClear();
    }

    #[On('checkbox-clear')]
    public function checkboxClear()
    {
        $this->reset('checkbox_arr', 'checkbox_status');
        $this->resetPage();
    }

    public function checkboxAll($data)
    {
        $this->checkbox_arr = $this->checkbox_status ? $data : [];
    }

    public function updated(): void
    {
        $this->resetPage();
    }
}
