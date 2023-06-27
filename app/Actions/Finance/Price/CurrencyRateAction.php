<?php
namespace App\Actions\Finance\Price;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CurrencyRateAction
{
    public static function handle(float $rate,int $price_id)
    {
        DB::table('currency_rates')->insertGetId([
            'price_id' => $price_id,
            'rate' => $rate,
            'created_at' => Carbon::now(),
         ]);
    }
}