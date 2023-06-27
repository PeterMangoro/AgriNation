<?php
namespace App\DataObjects\Finance\Income;

use App\DataObjects\Finance\Income\Partials\IncomeDisplay;


class IncomeDisplayData
{
    public static function toWebPage(
        object $incomes
    )
    {
        // dd($incomes);
        return $incomes->through(
            fn ($product)=> IncomeDisplay::data($product)
        );
    }
}