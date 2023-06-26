<?php
namespace App\Handlers\Fertilization;

use App\Events\Fertilization\CreatingFertilization;
use App\Http\Requests\Fertilization\CreateFertilizationRequest;
use App\DataObjects\Fertilization\FertilizationCreateData;

class FertilizationHandler
{
    public static function store(CreateFertilizationRequest $request)
    {
        $validated_object = FertilizationCreateData::fromRequest($request);
        event(new CreatingFertilization($validated_object));      
   
    }
}