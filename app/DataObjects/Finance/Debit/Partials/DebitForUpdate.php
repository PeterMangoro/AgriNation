<?php

namespace App\DataObjects\Finance\Debit\Partials;

use App\ValueObjects\Time;
use App\ValueObjects\Money;


class DebitForUpdate
{
    public function __construct(
        public  readonly ?string $source,     
        public  readonly ?string $source_id,  
        public  readonly string $price,   
        public  readonly ?string $currency,     
        public  readonly array $detail,        
        public  readonly int $id,
        public  readonly string $date,
        public  readonly string $uuid,
        public  readonly ?string $rate,

    ) {
    }

    public static function from(object $debit)
    {
        if ($debit->gardenDebit) {
            $source =  $debit->gardenDebit->garden->plant->title . ' (batch '. $debit->gardenDebit->garden->batch . ')' ;
            }
            else {
                $source = null;
            };
           
        return new self(
            $source ,  
            $debit->gardenDebit->garden->id ,          
            $debit->price->amount,
            $debit->price->currency,
            $debit->detail,           
            $debit->id,
            $debit->date,
            $debit->uuid,
            $debit->price->rate 
            ? $debit->price->rate->rate :
             null ,
        );
    }
}
