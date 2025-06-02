<?php

namespace App\Livewire;

use App\Models\Origin;
use App\Models\User;
use App\Notifications\CreateOriginNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ListOriginNotifier extends Component
{

    public Origin $origin;

    public function mount(Origin $origin)
    {
        $this->origin = $origin;
    }

    public function notifyUsers()
    {
        $users = User::where('email', 'like', '%@mff.gov.eg')->get();
        $this->origin = Origin::first();
        foreach ($users as $user) {
            $user->notify(new CreateOriginNotification($this->origin, Auth::user()));
        }
        session()->flash('success', 'Notifications and emails sent successfully.');
    }

    public function render()
    {
        return view('livewire.list-origin-notifier', [
            'notifications' => auth()->user()->notifications->filter(fn($n) => $n->data['origin_id'] == $this->origin->id)
        ]);
    }
}
