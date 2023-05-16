<?php

namespace App\Listeners\Chemical;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Chemical\UpdatingChemical;
use App\Services\Chemical\ChemicalService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateChemical
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
    public function handle(UpdatingChemical $event): void
    {
        $request = $event->validated_request;
        $chemical = $event->chemical;

        DB::transaction(function () use ($request, $chemical) {
            ChemicalService::update($request, $chemical);
            
            $request->images ?
             AttachmentService::addImages($request->images, $chemical, 'chemical', 600) : null;
            $request->document ?
            AttachmentService::addDocument($request->document, $chemical, 'chemical') : null;
        });
    }
}
