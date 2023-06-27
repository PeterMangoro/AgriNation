<?php

namespace App\DataObjects\Finance\Expenditure\Partials;

use App\ValueObjects\Money;


class ExpenditureDisplay
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
    public static function data($expenditure)
    {
        return new self(
            $expenditure->title,
            $expenditure->quantity,
            Money::from($expenditure->price),
            Money::usdEquivalent($expenditure->price),
            $expenditure->detail,           
            $expenditure->id
        );
    }
}
