<?php

namespace App\Observers;

use App\Models\Origin;

class OriginObserver
{
    /**
     * Handle the Origin "created" event.
     */
    public function created(Origin $origin): void
    {
        //
    }

    /**
     * Handle the Origin "updated" event.
     */
    public function updated(Origin $origin): void
    {
        //
    }

    /**
     * Handle the Origin "deleted" event.
     */
    public function deleted(Origin $origin): void
    {
        //
    }

    /**
     * Handle the Origin "restored" event.
     */
    public function restored(Origin $origin): void
    {
        //
    }

    /**
     * Handle the Origin "force deleted" event.
     */
    public function forceDeleted(Origin $origin): void
    {
        //
    }
}
