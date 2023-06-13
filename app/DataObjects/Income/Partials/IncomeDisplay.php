<?php

namespace App\DataObjects\Income\Partials;

use App\ValueObjects\Money;


class IncomeDisplay
{
    public function __construct(        
        public  readonly ?string $source,      
        public  readonly string $price,   
        public  readonly ?string $usd_equivalent,     
        public  readonly array $detail,        
        public  readonly int $id,
    ) {
    }
    public static function data($income)
    {
        // dd($income->garden);
       if ($income->gardenIncome) {
        $source =  $income->gardenIncome->garden->plant->title . ' (batch '. $income->gardenIncome->garden->batch . ')' ;
        }
        else {
            $source = null;
        };
        return new self(
            
            $source ,            
            Money::from($income->price),
            Money::usdEquivalent($income->price),
            $income->detail,           
            $income->id
        );
    }
}
