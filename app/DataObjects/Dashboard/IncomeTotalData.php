<?php
namespace App\DataObjects\Dashboard;

use App\Models\Price;
use App\ValueObjects\To2dp;
use App\Actions\Shared\Finance\GetTotal;

class IncomeTotalData
{
    public function __construct(
        public readonly string $approx_usd_total,
        public readonly string $usd,
        public readonly string $bond,
        public readonly string $rand,
        public readonly string $rtgs,
    )
    {        
    }

    public static function of()
    {
        $raw_total =  Price::whereNot('currency','usd')->where('priceable_type','App\Models\Income')->with('rate')->get();
        
        $total = $raw_total->map(function($money){           
           return ( $money->amount) / ($money->rate->rate);
        })->sum();

        return new static (
            '$USD '. To2dp::of(($total+GetTotal::ofIncome('usd'))) .('(approx.)'),
            '$USD '. To2dp::of( GetTotal::ofIncome('usd')) ,
             To2dp::of(GetTotal::ofIncome('bond')) .' BOND',
            To2dp::of(GetTotal::ofIncome('rand')) .' RAND',
            To2dp::of(GetTotal::ofIncome('rtgs')) .' ZW(RTGS)',
            
            

        )
       

            
         ;
    }
}