<?php

namespace App\Livewire\Log;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ListActivityLog extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function render()
    {
        $logs = Activity::with('causer')
            ->when($this->search, fn($query) =>
                $query->where('description', 'like', "%{$this->search}%")
            )
            ->orderByDesc('created_at')
            ->paginate($this->perPage);

        return view('livewire.log.list-activity-log', [
            'logs' => $logs
        ]);
    }
}
