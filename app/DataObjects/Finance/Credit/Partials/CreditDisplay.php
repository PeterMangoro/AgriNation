<?php

namespace App\DataObjects\Finance\Credit\Partials;

use App\ValueObjects\Money;


class CreditDisplay
{
    public function __construct(        
        public  readonly string $title,
        public  readonly int $quantity,
        public  readonly string $price,   
        public  readonly ?string $usd_equivalent,     
        public  readonly array $detail,        
        public  readonly int $id,
    ) {
    }
    public static function data($credit)
    {
        return new self(
            $credit->title,
            $credit->quantity,
            Money::from($credit->price),
            Money::usdEquivalent($credit->price),
            $credit->detail,           
            $credit->id
        );
    }
}
