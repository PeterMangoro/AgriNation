<?php
namespace App\Services\Plant;

use App\Models\Garden\Plant;
use App\Actions\Plant\PlantLocationAction;

class PlantLocationService
{
    public static function addPlantLocation(Plant $plant, object $validated_request):void
    {
        (new PlantLocationAction($plant,$validated_request))->addToLocation();
    }

    public static function addNursery(Plant $plant, object $validated_request):void
    {
        (new PlantLocationAction($plant,$validated_request))->addToNursery();
    }
}