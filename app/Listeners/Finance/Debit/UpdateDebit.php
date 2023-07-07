<?php

namespace App\Listeners\Finance\Debit;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Finance\Debit\UpdatingDebit;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Finance\Debit\DebitService;

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
        $request = $event->validated_request;
        $debit = $event->debit;

        DB::transaction(function () use ($request, $debit) {
            // dd($request);
            DebitService::update($request, $debit);            
          
        });
    }
}
