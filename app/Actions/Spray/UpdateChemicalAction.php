<?php

namespace App\Actions\Chemical;

class UpdateChemicalAction
{
    public static function handle(object $validated_request, object $chemical): void
    {
        $chemical->title = $validated_request->title;
        $chemical->detail = $validated_request->detail; 
        $chemical->type = $validated_request->type;        
        $chemical->save();
    }
}
