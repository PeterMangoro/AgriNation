<?php

namespace App\Listeners\Finance\Credit;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Finance\Price\PriceService;
use App\Events\Finance\Credit\CreatingCredit;
use App\Services\Finance\Credit\CreditService;

class CreateCredit
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
    public function handle(CreatingCredit $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $credit_id = CreditService::create($request);  
        PriceService::create($request,'Credit',$credit_id);   
        }); 
    }
}
