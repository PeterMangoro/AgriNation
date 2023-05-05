<?php

namespace App\Listeners\Expenditure;

use Illuminate\Support\Facades\DB;
use App\Services\Price\PriceService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Expenditure\CreatingExpenditure;
use App\Services\Expenditure\ExpenditureService;

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
        PriceService::create($request,$expenditure_id);   
        });       
       
   
        
    }
}
