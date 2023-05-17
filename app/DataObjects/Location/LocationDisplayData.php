<?php
namespace App\DataObjects\Location;

use App\DataObjects\Location\Partials\LocationDisplay;

class LocationDisplayData
{
    public static function toWebPage(
        object $locations
    )
    {
        return $locations->through(
            fn ($product)=> LocationDisplay::data($product)
        );
    }
}