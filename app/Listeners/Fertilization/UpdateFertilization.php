<?php

namespace App\Listeners\Fertilization;

use App\Events\Fertilization\UpdatingFertilization;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateFertilization
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
    public function handle(UpdatingFertilization $event): void
    {
        //
    }
}
