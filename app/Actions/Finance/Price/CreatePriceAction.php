<?php

namespace App\Actions\Finance\Price;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreatePriceAction
{
    public static function handle(object $validated_request, string $model, int $expenditure_id)
    {
        $price_id = DB::table('prices')->insertGetId([
            'priceable_id' => $expenditure_id,
            'priceable_type' => 'App\\Models\\Finance\\' . $model,
            'amount' => $validated_request->price,
            'currency' => $validated_request->currency,
            'created_at' => Carbon::now(),
        ]);

        if ($validated_request->currency != 'usd') {
            CurrencyRateAction::handle($validated_request->rate, $price_id);
        }
    }
}
