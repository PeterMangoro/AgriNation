<?php

namespace App\Listeners\Income;

use App\Events\Income\UpdatingIncome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateIncome
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
    public function handle(UpdatingIncome $event): void
    {
        //
    }
}
