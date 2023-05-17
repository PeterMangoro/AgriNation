<?php
namespace App\Handlers\Location;

use App\Events\Location\CreatingLocation;
use App\Events\Location\UpdatingLocation;
use App\DataObjects\Location\LocationCreateData;
use App\DataObjects\Location\LocationUpdateData;
use App\Http\Requests\Location\CreateLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;

class LocationHandler
{
    public static function store(CreateLocationRequest $request)
    {
        $validated_object = LocationCreateData::fromRequest($request);
        event(new CreatingLocation($validated_object));      
   
    }

    public static function update(
        UpdateLocationRequest $request,
        string $uuid
    ) {
        $validated_object = LocationUpdateData::fromRequest($request);
        event(
            new UpdatingLocation($validated_object, $uuid)
        );
    }
}