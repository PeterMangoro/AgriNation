<?php
namespace App\DataObjects\Finance\Debit;

use App\DataObjects\Finance\Debit\Partials\DebitDisplay;


class DebitDisplayData
{
    public static function toWebPage(
        object $debits
    )
    {
        // dd($debits);
        return $debits->through(
            fn ($debit)=> DebitDisplay::data($debit)
        );
    }
}