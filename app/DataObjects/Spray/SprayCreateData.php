<?php

namespace App\DataObjects\Spray;

class SprayCreateData
{
    public function __construct(
        public readonly array $locations,
        public readonly array $chemicals,
        public readonly array $plants,        
        public readonly string $detail,      
        public readonly string $date,
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(
            $request->locations,
            $request->chemicals,
            $request->plants,
            $request->detail,
            $request->date,            
        );
    }
}
