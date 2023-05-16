<?php

namespace App\Listeners\Chemical;

use App\Events\Chemical\UpdatingChemical;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateChemical
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
    public function handle(UpdatingChemical $event): void
    {
        //
    }
}
