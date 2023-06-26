<?php

namespace App\DataObjects\Dashboard\Spray;

use App\Models\Garden\Plant;
use App\Models\Spray\Chemical;
use App\Models\Garden\Location;

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
