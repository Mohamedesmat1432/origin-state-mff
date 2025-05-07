<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class LocationPicker extends Component
{
    public float $centerLat = 30.0444;
    public float $centerLng = 31.2357;
    public float $latitude = 30.0450;
    public float $longitude = 31.2360;

    public function render()
    {
        return view('livewire.location-picker');
    }
}
