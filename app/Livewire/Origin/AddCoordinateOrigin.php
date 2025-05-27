<?php

namespace App\Livewire\Origin;

use App\Models\Origin;
use App\Traits\OriginTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.app')]
class AddCoordinateOrigin extends Component
{
    use OriginTrait;

    public $excel_file = null;

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

    public function uploadCoordinates()
    {
        $this->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        $data = Excel::toCollection(null, $this->excel_file);

        // Assuming coordinates are in the first sheet and first two columns
        $rows = $data[0]; // Get first sheet

        $coords = [];
        foreach ($rows as $row) {
            if (isset($row[0]) && isset($row[1])) {
                $coords[] = [$row[0],$row[1]];
            }
        }

        $this->coordinates = json_encode($coords);
        $this->dispatch('coordinates-updated');
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
