<?php
namespace App\DataObjects\Income;

use App\DataObjects\Income\Partials\IncomeDisplay;

class IncomeDisplayData
{
    public static function toWebPage(
        object $incomes
    )
    {
        // dd($incomes->garden);
        return $incomes->through(
            fn ($product)=> IncomeDisplay::data($product)
        );
    }
}