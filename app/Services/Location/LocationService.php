<?php
namespace App\Services\Location;

use App\Actions\Location\CreateLocationAction;
use App\Actions\Location\UpdateLocationAction;

class LocationService
{
    public static function create(object $request)
    {
        return CreateLocationAction::handle($request);
    }

    public static function update(object $request, object $location)
    {
        return UpdateLocationAction::handle($request, $location);
    }
}