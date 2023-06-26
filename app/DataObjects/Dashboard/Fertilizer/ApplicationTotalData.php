<?php

namespace App\DataObjects\Dashboard\Fertilizer;

use App\Models\Garden\Plant;
use App\Models\Garden\Location;
use App\Models\Fertilizer\Fertilizer;

class ApplicationTotalData
{
    public static function ofFertilizer()
    {
        $fertilizers = Fertilizer::get();

        return  $fertilizers->map(fn ($fertilizer) => [
            'fertilizer' => $fertilizer->title,
            'total' => $fertilizer->fertilized()->count(),
        ]);
    }

    public static function ofLocation()
    {
        $locations = Location::get();

        return  $locations->map(fn ($location) => [
            'location' => $location->title,
            'total' => $location->fertilized()->count(),
        ]);
    }

    public static function ofPlant()
    {
        $plants = Plant::get();

        return  $plants->map(fn ($plant) => [
            'plant' => $plant->title,
            'total' => $plant->fertilized()->count(),
        ]);
    }
}
