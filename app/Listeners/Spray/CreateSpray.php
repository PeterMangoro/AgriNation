<?php

namespace App\Listeners\Spray;

use App\Events\Spray\CreatingSpray;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSpray
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
    public function handle(CreatingSpray $event): void
    {
        //
    }
}
