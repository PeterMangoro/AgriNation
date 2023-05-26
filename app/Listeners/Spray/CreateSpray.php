<?php

namespace App\Listeners\Spray;

use Illuminate\Support\Facades\DB;
use App\Events\Spray\CreatingSpray;
use App\Services\Spray\SprayService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Spray\SprayComboService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateSpray
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
    public function handle(CreatingSpray $event): void
    {
        $request = $event->validated_request;
     
      SprayService::create($request);  
       
       
    }
}
