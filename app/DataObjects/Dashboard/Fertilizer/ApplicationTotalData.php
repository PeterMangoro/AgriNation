<?php

namespace App\DataObjects\Dashboard\Fertilizer;

use App\Models\Plant;
use App\Models\Chemical;
use App\Models\Location;

class ApplicationTotalData
{
    public static function ofChemical()
    {
        $chemicals = Chemical::get();

        return  $chemicals->map(fn ($chemical) => [
            'chemical' => $chemical->title,
            'total' => $chemical->applied()->count(),
        ]);
    }

    public static function ofLocation()
    {
        $locations = Location::get();

        return  $locations->map(fn ($location) => [
            'location' => $location->title,
            'total' => $location->applied()->count(),
        ]);
    }

    public static function ofPlant()
    {
        $plants = Plant::get();

        return  $plants->map(fn ($plant) => [
            'plant' => $plant->title,
            'total' => $plant->applied()->count(),
        ]);
    }
}
