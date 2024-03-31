<?php

namespace App\Listeners;

use App\Events\NotificationEventLivreur;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationListenerLivreur
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NotificationEventLivreur $event): void
    {
        #dd($event->data);
    }
}
