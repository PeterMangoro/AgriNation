<?php
namespace App\Services\Plant;

use App\Actions\Plant\CreatePlantAction;
use App\Actions\Plant\UpdatePlantAction;

class PlantService
{
    public static function create(object $request)
    {
        return 
        (new CreatePlantAction())->handle($request);
    }

    public static function update(object $request, object $plant)
    {
        return UpdatePlantAction::handle($request, $plant);
    }
}