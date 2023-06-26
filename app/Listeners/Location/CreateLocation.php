<?php

namespace App\Listeners\Location;

use App\Models\Garden\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Location\CreatingLocation;
use App\Services\Location\LocationService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateLocation
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
    public function handle(CreatingLocation $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $location_id = LocationService::create($request);
        $location = Location::find($location_id);
        $request->images ?
        AttachmentService::addImages($request->images, $location, 'location',600) : null;    
        $request->document ?
        AttachmentService::addDocument($request->document, $location, 'location') : null;    
        
        }); 
    }
}
