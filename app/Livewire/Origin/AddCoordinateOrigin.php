<?php

namespace App\Livewire\Origin;

use App\Models\Origin;
use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class AddCoordinateOrigin extends Component
{
    use OriginTrait;

    #[On('add-coodinates')]
    public function setCoordinates($id)
    {
        $this->origin = Origin::with($this->relations)->findOrFail($id);
        $this->map_government = $this->origin->government->name;
        $this->map_city = $this->origin->city->name;
        $this->coordinates = $this->origin->coordinates;
        $this->total_area_coords = $this->origin->total_area_coords;
        $this->add_coodinates = true;
    }

    public function save()
    {
        $this->addCoordinates();
    }

    public function render()
    {
        $this->authorize('add-coordinate-origin');
        
        return view('livewire.origin.add-coordinate-origin');
    }
}
