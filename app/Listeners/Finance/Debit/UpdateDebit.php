<?php

namespace App\Listeners\Finance\Debit;

use App\Events\Finance\Debit\UpdatingDebit;
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
