<?php
namespace App\DataObjects\Finance\Expenditure;

use App\DataObjects\Finance\Expenditure\Partials\ExpenditureDisplay;


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