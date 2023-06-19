<?php
namespace App\Handlers\Fertilizer;

use App\Events\Fertilizer\CreatingFertilizer;
use App\Events\Fertilizer\UpdatingFertilizer;
use App\DataObjects\Fertilizer\FertilizerCreateData;
use App\DataObjects\Fertilizer\FertilizerUpdateData;
use App\Http\Requests\Fertilizer\CreateFertilizerRequest;
use App\Http\Requests\Fertilizer\UpdateFertilizerRequest;

class FertilizerHandler
{
    public static function store(CreateFertilizerRequest $request)
    {
        $validated_object = FertilizerCreateData::fromRequest($request);
        event(new CreatingFertilizer($validated_object));      
   
    }

    public static function update(
        UpdateFertilizerRequest $request,
        string $uuid
    ) {
        $validated_object = FertilizerUpdateData::fromRequest($request);
        event(
            new UpdatingFertilizer($validated_object, $uuid)
        );
    }
}