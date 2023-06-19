<?php

namespace App\Listeners\Fertilizer;

use App\Models\Fertilizer;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Fertilizer\CreatingFertilizer;
use App\Services\Fertilizer\FertilizerService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateFertilizer
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
    public function handle(CreatingFertilizer $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $fertilizer_id = FertilizerService::create($request);
        $fertilizer = Fertilizer::find($fertilizer_id);
        $request->images ?
        AttachmentService::addImages($request->images, $fertilizer, 'fertilizer',600) : null;    
        $request->document ?
        AttachmentService::addDocument($request->document, $fertilizer, 'fertilizer') : null;    
        
        }); 
    }
}
