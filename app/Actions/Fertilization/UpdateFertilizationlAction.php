<?php

namespace App\Actions\Fertilization;

class UpdateFertilizationAction
{
    public static function handle(object $validated_request, object $fertilization): void
    {
        $fertilization->title = $validated_request->title;
        $fertilization->detail = $validated_request->detail; 
        $fertilization->type = $validated_request->type;        
        $fertilization->save();
    }
}
