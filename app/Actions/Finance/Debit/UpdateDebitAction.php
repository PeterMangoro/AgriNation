<?php

namespace App\Actions\Finance\Debit;

use Illuminate\Support\Facades\DB;

class UpdateDebitAction
{
    public static function handle(object $validated_request, object $debit): void
    {
        $debit->detail = $validated_request->detail;
        $debit->gardenDebit->garden_id = $validated_request->source;
        $debit->price->amount = $validated_request->price;
        $debit->price->currency = $validated_request->currency;
       
        // dd($debit->price->id);

       DB::table('currency_rates')
    ->updateOrInsert(
        ['price_id' => $debit->price->id],
        ['rate' =>  $validated_request->rate]
    );

    $debit->save();
    $debit->gardenDebit->save();
    $debit->price->save();
    }
}
