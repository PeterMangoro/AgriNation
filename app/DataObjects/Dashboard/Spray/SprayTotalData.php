<?php

namespace App\DataObjects\Dashboard\Spray;

use App\Models\Plant;
use App\Models\Chemical;
use App\Models\Location;

class SprayTotalData
{
    public static function ofChemical()
    {
        $chemicals = Chemical::get();

        return  $chemicals->map(fn ($chemical) => [
            'chemical' => $chemical->title,
            'total' => $chemical->sprayed()->count(),
        ]);
    }

    public static function ofLocation()
    {
        $locations = Location::get();

        return  $locations->map(fn ($location) => [
            'location' => $location->title,
            'total' => $location->sprayed()->count(),
        ]);
    }

    public static function ofPlant()
    {
        $plants = Plant::get();

        return  $plants->map(fn ($plant) => [
            'plant' => $plant->title,
            'total' => $plant->sprayed()->count(),
        ]);
    }
}
