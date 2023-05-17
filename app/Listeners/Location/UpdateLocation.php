<?php

namespace App\Listeners\Location;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Location\UpdatingLocation;
use App\Services\Location\LocationService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateLocation
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
    public function handle(UpdatingLocation $event): void
    {
        $request = $event->validated_request;
        $location = $event->location;

        DB::transaction(function () use ($request, $location) {
            LocationService::update($request, $location);
            
            $request->images ?
             AttachmentService::addImages($request->images, $location, 'location', 600) : null;
            $request->document ?
            AttachmentService::addDocument($request->document, $location, 'location') : null;
        });
    }
    
}
