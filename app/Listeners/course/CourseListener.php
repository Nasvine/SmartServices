<?php

namespace App\Listeners\course;

use App\Events\course\CourseEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CourseListener
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
    public function handle(CourseEvent $event): void
    {
       // dd($event->data);
    }
}
