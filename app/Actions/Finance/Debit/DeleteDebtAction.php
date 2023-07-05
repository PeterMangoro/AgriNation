<?php

namespace App\Actions\Finance\Debit;

use App\Models\Finance\Debit;
use App\Models\Finance\Price;

class DeleteDebtAction
{
    public static function handle(Debit $debt): void
    {
        $debt->debt = false;
        $debt->price->priceable_type = 'App\Models\Finance\Income';
        $debt->price->save();
        $debt->save();
    }
}
