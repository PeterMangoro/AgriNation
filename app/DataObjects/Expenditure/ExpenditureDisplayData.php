<?php
namespace App\DataObjects\Expenditure;

use App\DataObjects\Expenditure\Partials\ExpenditureDisplay;

class ExpenditureDisplayData
{
    public static function toWebPage(
        object $expenditures
    )
    {
        return $expenditures->through(
            fn ($product)=> ExpenditureDisplay::data($product)
        );
    }
}