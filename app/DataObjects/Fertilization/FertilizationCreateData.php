<?php

namespace App\DataObjects\Fertilization;

class FertilizationCreateData
{
    public function __construct(
        public readonly array $locations,
        public readonly array $fertilizers,
        public readonly array $plants,        
        public readonly string $detail,      
        public readonly string $date,
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(
            $request->locations,
            $request->fertilizers,
            $request->plants,
            $request->detail,
            $request->date,            
        );
    }
}
