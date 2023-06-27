<?php
namespace App\DataObjects\Finance\Credit;

use App\DataObjects\Finance\Credit\Partials\CreditDisplay;


class CreditDisplayData
{
    public static function toWebPage(
        object $credits
    )
    {
        // dd($credits);
        return $credits->through(
            fn ($credit)=> CreditDisplay::data($credit)
        );
    }
}