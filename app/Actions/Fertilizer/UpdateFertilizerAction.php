<?php

namespace App\Actions\Fertilizer;

class UpdateFertilizerAction
{
    public static function handle(object $validated_request, object $fertilizer): void
    {
        $fertilizer->title = $validated_request->title;
        $fertilizer->detail = $validated_request->detail; 
        $fertilizer->type = $validated_request->type;        
        $fertilizer->save();
    }
}
