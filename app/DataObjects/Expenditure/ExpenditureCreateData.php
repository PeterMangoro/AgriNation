<?php

namespace App\DataObjects\Expenditure;

class ExpenditureCreateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $currency,
        public readonly ?float $rate,
        public readonly string $price,
        public readonly string $quantity,
        public readonly string $units,
        public readonly string $detail,
        public readonly string $shop,
        public readonly string $date,
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(
            $request->title,
            $request->currency,
            $request->rate,
            $request->price,
            $request->quantity,
            $request->units,
            $request->detail,
            $request->shop,
            $request->date,
        );
    }
}
