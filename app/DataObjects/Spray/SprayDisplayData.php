<?php
namespace App\DataObjects\Spray;

use App\DataObjects\Spray\Partials\SprayDisplay;

class SprayDisplayData
{
    public static function toWebPage(
        object $sprays
    )
    {
        return $sprays->through(
            fn ($product)=> SprayDisplay::data($product)
        );
    }
}