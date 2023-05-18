<?php

namespace App\Listeners\Plant;

use App\Events\Plant\UpdatingPlant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePlant
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
    public function handle(UpdatingPlant $event): void
    {
        //
    }
}
