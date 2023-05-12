<?php

namespace App\Listeners\Chemical;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Chemical\CreatingChemical;
use App\Services\Chemical\ChemicalService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateChemical
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
    public function handle(CreatingChemical $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
        $chemical_id = ChemicalService::create($request);
        }); 
    }
}
