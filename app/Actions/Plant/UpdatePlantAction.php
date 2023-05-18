<?php

namespace App\Actions\Plant;

class UpdatePlantAction
{
    public static function handle(object $validated_request, object $plant): void
    {
        $plant->title = $validated_request->title;
        $plant->detail = $validated_request->detail;                
        $plant->save();
    }
}
