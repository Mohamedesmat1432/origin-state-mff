<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.home.home-component');
    }
}
