<?php

namespace App\Listeners\Finance\Expenditure;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Finance\Price\PriceService;
use App\Events\Finance\Expenditure\CreatingExpenditure;
use App\Services\Finance\Expenditure\ExpenditureService;

class CreateExpenditure
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
    public function handle(CreatingExpenditure $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $expenditure_id = ExpenditureService::create($request);  
        PriceService::create($request,'Expenditure',$expenditure_id);   
        }); 
    }
}
