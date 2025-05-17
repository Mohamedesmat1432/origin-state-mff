<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class LocationPicker extends Component
{
    public array $coordinates = [];
    public float $area = 0;

    public function render()
    {
        return view('livewire.location-picker');
    }
}
