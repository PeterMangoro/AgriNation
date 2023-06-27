<?php

namespace App\DataObjects\Dashboard\Finance;


use App\ValueObjects\To2dp;
use App\Models\Finance\Price;
use App\Actions\Shared\Finance\GetTotal;

class ExpenditureTotalData
{
    public function __construct(
        public readonly string $approx_usd_total,
        public readonly string $usd,
        public readonly string $bond,
        public readonly string $rand,
        public readonly string $rtgs,
    ) {
    }

    public static function of()
    {
        $raw_total =  Price::whereNot('currency', 'usd')->where('priceable_type', 'App\Models\Finance\Expenditure')->with('rate')->get();

        $total = $raw_total->map(function ($money) {
            return ($money->amount) / ($money->rate->rate);
        })->sum();

        return new static(
            '$USD ' . To2dp::of(($total + GetTotal::ofExpenditure('usd'))) . ('(approx.)'),
            '$USD ' . To2dp::of(GetTotal::ofExpenditure('usd')),
            To2dp::of(GetTotal::ofExpenditure('bond')) . ' BOND',
            To2dp::of(GetTotal::ofExpenditure('rand')) . ' RAND',
            To2dp::of(GetTotal::ofExpenditure('rtgs')) . ' ZW(RTGS)',



        );
    }
}
