<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ListOriginNotifier extends Component
{
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications->find($id);
        if ($notification && is_null($notification->read_at)) {
            $notification->markAsRead();
        }
    }

    public function render()
    {
        return view('livewire.list-origin-notifier', [
            'notifications' => auth()->user()->notifications
        ]);
    }
}
