<?php

namespace App\DataObjects\Chemical;

class ChemicalCreateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $detail,
        public readonly string $type,       
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(
            $request->title,
            $request->detail,
            $request->type,           
        );
    }
}
