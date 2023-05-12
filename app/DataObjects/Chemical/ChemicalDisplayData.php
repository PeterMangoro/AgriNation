<?php
namespace App\DataObjects\Chemical;

use App\DataObjects\Chemical\Partials\ChemicalDisplay;

class ChemicalDisplayData
{
    public static function toWebPage(
        object $chemicals
    )
    {
        return $chemicals->through(
            fn ($product)=> ChemicalDisplay::data($product)
        );
    }
}