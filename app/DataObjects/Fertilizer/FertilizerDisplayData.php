<?php
namespace App\DataObjects\Fertilizer;

use App\DataObjects\Fertilizer\Partials\FertilizerDisplay;

class FertilizerDisplayData
{
    public static function toWebPage(
        object $fertilizers
    )
    {
        return $fertilizers->through(
            fn ($product)=> FertilizerDisplay::data($product)
        );
    }
}