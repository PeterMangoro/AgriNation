<?php
namespace App\DataObjects\Plant;

use App\DataObjects\Plant\Partials\PlantDisplay;

class PlantDisplayData
{
    public static function toWebPage(
        object $plants
    )
    {
        // $plants->dd();
        return $plants->through(
            fn ($plant)=> PlantDisplay::data($plant)
        );
    }
}