<?php

namespace App\Listeners\Spray;

use App\Events\Spray\UpdatingSpray;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateSpray
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
    public function handle(UpdatingSpray $event): void
    {
        //
    }
}
