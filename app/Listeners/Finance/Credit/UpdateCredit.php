<?php

namespace App\Listeners\Finance\Credit;

use App\Events\Finance\Credit\UpdatingCredit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCredit
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
    public function handle(UpdatingCredit $event): void
    {
        //
    }
}
