<?php
namespace App\Handlers\Plant;

use App\Events\Plant\CreatingPlant;
use App\Events\Plant\UpdatingPlant;
use App\DataObjects\Plant\PlantCreateData;
use App\DataObjects\Plant\PlantUpdateData;
use App\Http\Requests\Plant\CreatePlantRequest;
use App\Http\Requests\Plant\UpdatePlantRequest;

class PlantHandler
{
    public static function store(CreatePlantRequest $request)
    {
        $validated_object = PlantCreateData::fromRequest($request);
        event(new CreatingPlant($validated_object));      
   
    }

    public static function update(
        UpdatePlantRequest $request,
        string $uuid
    ) {
        $validated_object = PlantUpdateData::fromRequest($request);
        event(
            new UpdatingPlant($validated_object, $uuid)
        );
    }
}