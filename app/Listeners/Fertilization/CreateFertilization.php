<?php

namespace App\Listeners\Fertilization;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Fertilization\CreatingFertilization;
use App\Services\Fertilization\FertilizationService;

class CreateFertilization
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
    public function handle(CreatingFertilization $event): void
    {
        $request = $event->validated_request;
     
      FertilizationService::create($request);  
       
       
    }
}
