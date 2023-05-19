<?php
namespace App\Actions\Price;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreatePriceAction
{
    public static function handle(object $validated_request, int $expenditure_id) 
    {
        $price_id = DB::table('prices')->insertGetId([
            'expenditure_id' => $expenditure_id,
            'amount' => $validated_request->price,
            'currency' => $validated_request->currency,
            'created_at' => Carbon::now(),
         ]);
   
         if ($validated_request->currency != 'usd') {
            CurrencyRateAction::handle($validated_request->rate,$price_id);
         }
    }
}