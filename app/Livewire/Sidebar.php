<?php

namespace App\Livewire;

use App\Traits\NavSidebarTrait;
use Livewire\Component;

class Sidebar extends Component
{
    use NavSidebarTrait;

    public function render()
    {
        return view('livewire.sidebar');
    }
}
