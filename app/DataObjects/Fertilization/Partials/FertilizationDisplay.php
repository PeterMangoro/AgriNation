<?php

namespace App\DataObjects\Fertilization\Partials;

use App\ValueObjects\Money;
use App\ValueObjects\Time;

class FertilizationDisplay
{
    public function __construct(        
        public  readonly object $fertilizers,
        public  readonly object $locations,
        public  readonly object $plants,
        // public  readonly int $quantity,
        // public  readonly string $price,   
        // public  readonly ?string $usd_equivalent,     
        public  readonly array $detail,        
        public  readonly int $id,
         public  readonly string $fertilization_date, 
    ) {
    }
    public static function data($fertilization)
    {
    return new self(
        $fertilization->usedFertilizer->map(fn($fertilizer)=>[
            'title'=>$fertilizer->fertilizer->title]),

            $fertilization->fertilizedLocation->map(fn($location)=>[
                'title'=>$location->location->title]),

                $fertilization->fertilizedPlant->map(fn($plant)=>[
                    'title'=>$plant->plant->title]),
           
            $fertilization->detail,           
            $fertilization->id,
           Time::date( $fertilization->fertilization_date)
        );
    }
}
