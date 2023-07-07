<?php

namespace App\DataObjects\Finance\Debit;

class DebitUpdateData
{
    public function __construct(       
        public readonly string $currency,
        public readonly ?float $rate,
        public readonly string $price,       
        public readonly string $detail,
        public readonly string $source,
        public readonly string $date,
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(            
            $request->currency,
            $request->rate,
            $request->price,            
            $request->detail,
            $request->source,
            $request->date,
        );
    }
}
