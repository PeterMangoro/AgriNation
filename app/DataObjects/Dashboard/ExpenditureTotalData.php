<?php
namespace App\DataObjects\Dashboard;

use App\Actions\Expenditure\GetTotal;
use App\Models\Price;
use App\ValueObjects\To2dp;
use App\Views\Shared\BaseView;


class ExpenditureTotalData
{
    public function __construct(
        public readonly string $approx_usd_total,
        public readonly string $usd,
        // public readonly string $bond,
        public readonly string $rand,
        public readonly string $rtgs,
    )
    {        
    }

    public static function of()
    {
        $raw_total =  Price::whereNot('currency','usd')->with('rate')->get();
        
        $total = $raw_total->map(function($money){           
           return ( $money->amount) / ($money->rate->rate);
        })->sum();

        // dd([
        //     'bond'=>$total,
        //     'usd'=>GetTotal::of('usd'),
        //     'total'=>To2dp::of($total+GetTotal::of('usd')),
        
        // ]);
        return new static (
            '$USD '. To2dp::of(($total+GetTotal::of('usd'))) .('(approx.)'),
            '$USD '. To2dp::of( GetTotal::of('usd')) ,
            //  To2dp::of(GetTotal::of('bond')) .' BOND',
            To2dp::of(GetTotal::of('rand')) .' RAND',
            To2dp::of(GetTotal::of('rtgs')) .' ZW(RTGS)',
            
            

        )
       

            
         ;
    }
}