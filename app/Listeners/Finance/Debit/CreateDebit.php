<?php

namespace App\Listeners\Finance\Debit;

use Illuminate\Support\Facades\DB;

use App\Events\Finance\Debit\CreatingDebit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Finance\Price\PriceService;
use App\Services\Finance\Debit\DebitService;


class CreateDebit
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
    public function handle(CreatingDebit $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $debit_id = DebitService::create($request);  
        PriceService::create($request,'Debit',$debit_id);  
        
        if ($request->source != 'other') {
           DebitService::forHarvest($request,$debit_id);
        }
      
        }); 
    }
}
