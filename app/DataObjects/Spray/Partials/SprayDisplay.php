<?php

namespace App\DataObjects\Spray\Partials;

use App\ValueObjects\Money;


class SprayDisplay
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
    public static function data($spray)
    {
        return new self(
            $spray->title,
            $spray->quantity,
            Money::from($spray->price),
            Money::usdEquivalent($spray->price),
            $spray->detail,           
            $spray->id
        );
    }
}
