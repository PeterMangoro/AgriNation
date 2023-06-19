<?php

namespace App\Listeners\Fertilizer;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Fertilizer\UpdatingFertilizer;
use App\Services\Fertilizer\FertilizerService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateFertilizer
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
    public function handle(UpdatingFertilizer $event): void
    {
        $request = $event->validated_request;
        $fertilizer = $event->fertilizer;

        DB::transaction(function () use ($request, $fertilizer) {
            FertilizerService::update($request, $fertilizer);
            
            $request->images ?
             AttachmentService::addImages($request->images, $fertilizer, 'fertilizer', 600) : null;
            $request->document ?
            AttachmentService::addDocument($request->document, $fertilizer, 'fertilizer') : null;
        });
    }
}
