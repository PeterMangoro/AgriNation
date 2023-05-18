<?php
namespace App\Services\Plant;

use App\Actions\Plant\PlantLocationAction;
use App\Models\Plant;

class PlantLocationService
{
    public static function addPlantLocation(Plant $plant, object $validated_request):void
    {
        PlantLocationAction::addToLocation($plant,$validated_request);
    }

    public static function addNursery()
    {
        
    }
}