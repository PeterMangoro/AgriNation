<?php

namespace App\Listeners\Plant;

use App\Models\Plant;
use Illuminate\Support\Facades\DB;
use App\Events\Plant\CreatingPlant;
use App\Services\Plant\PlantLocationService;
use App\Services\Plant\PlantService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePlant
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
    public function handle(CreatingPlant $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $plant_id = PlantService::create($request);
        $plant = Plant::find($plant_id);

        $request->stage=='nursery' ? 
        PlantLocationService::addNursery($plant,$request) :
        PlantLocationService::addPlantLocation($plant,$request);
        
        $request->images ?
        AttachmentService::addImages($request->images, $plant, 'plant',600) : null;    
        $request->document ?
        AttachmentService::addDocument($request->document, $plant, 'plant') : null;    
        
        }); 
    }
}
