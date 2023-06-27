<?php

namespace App\Listeners\Finance\Expenditure;

use App\Events\Finance\Income\UpdatingDebit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateDebit
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
    public function handle(UpdatingDebit $event): void
    {
        //
    }
}
