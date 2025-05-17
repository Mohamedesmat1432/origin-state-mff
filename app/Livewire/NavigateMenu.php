<?php

// declare(strict_types=1);

namespace App\Livewire;

use App\Traits\NavSidebarTrait;
use Livewire\Component;

class NavigateMenu extends Component
{
    use NavSidebarTrait;

    public function render()
    {
        return view('livewire.navigate-menu');
    }
}
