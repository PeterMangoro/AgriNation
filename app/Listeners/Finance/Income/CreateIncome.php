<?php

namespace App\Listeners\Finance\Income;

use Illuminate\Support\Facades\DB;

use App\Events\Finance\Income\CreatingIncome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Finance\Price\PriceService;
use App\Services\Finance\Income\IncomeService;


class CreateIncome
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
    public function handle(CreatingIncome $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $income_id = IncomeService::create($request);  
        PriceService::create($request,'Income',$income_id);  
        
        if ($request->source != 'other') {
           IncomeService::forHarvest($request,$income_id);
        }
      
        }); 
    }
}
