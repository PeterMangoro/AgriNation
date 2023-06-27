<?php

namespace App\DataObjects\Finance\Debit\Partials;

use App\ValueObjects\Money;
use App\ValueObjects\Time;

class DebitDisplay
{
    public function __construct(        
        public  readonly ?string $source,      
        public  readonly string $price,   
        public  readonly ?string $usd_equivalent,     
        public  readonly array $detail,        
        public  readonly int $id,
        public  readonly string $date,
    ) {
    }
    public static function data($debit)
    {
        // dd($debit->gardenDebit);
       if ($debit->gardenDebit) {
        $source =  $debit->gardenDebit->garden->plant->title . ' (batch '. $debit->gardenDebit->garden->batch . ')' ;
        }
        else {
            $source = null;
        };
        return new self(
            
            $source ,            
            Money::from($debit->price),
            Money::usdEquivalent($debit->price),
            $debit->detail,           
            $debit->id,
            Time::date($debit->date),  
            
        );
    }
}
