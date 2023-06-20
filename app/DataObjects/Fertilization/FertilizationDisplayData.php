<?php
namespace App\DataObjects\Fertilization;

use App\DataObjects\Fertilization\Partials\FertilizationDisplay;

class FertilizationDisplayData
{
    public static function toWebPage(
        object $fertilizations
    )
    {
        return $fertilizations->through(
            fn ($product)=> FertilizationDisplay::data($product)
        );
    }
}