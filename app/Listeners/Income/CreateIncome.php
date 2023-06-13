<?php

namespace App\Listeners\Income;

use Illuminate\Support\Facades\DB;
use App\Services\Price\PriceService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Income\CreatingIncome;
use App\Services\Income\IncomeService;

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
