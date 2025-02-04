<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class HomeMenu extends Component
{
    public function render()
    {
        return view('livewire.home-menu');
    }
}
