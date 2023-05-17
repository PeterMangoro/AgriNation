<?php

namespace App\Actions\Location;

class UpdateLocationAction
{
    public static function handle(object $validated_request, object $location): void
    {
        $location->title = $validated_request->title;
        $location->detail = $validated_request->detail; 
        $location->area = $validated_request->area;        
        $location->save();
    }
}
