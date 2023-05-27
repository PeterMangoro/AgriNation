<?php

namespace App\DataObjects\Spray\Partials;

use App\ValueObjects\Money;
use App\ValueObjects\Time;

class SprayDisplay
{
    public function __construct(        
        public  readonly object $chemicals,
        public  readonly object $locations,
        public  readonly object $plants,
        // public  readonly int $quantity,
        // public  readonly string $price,   
        // public  readonly ?string $usd_equivalent,     
        public  readonly array $detail,        
        public  readonly int $id,
         public  readonly string $spray_date, 
    ) {
    }
    public static function data($spray)
    {
    return new self(
        $spray->sprayedChemical->map(fn($chemical)=>[
            'title'=>$chemical->chemical->title]),

            $spray->sprayedLocation->map(fn($location)=>[
                'title'=>$location->location->title]),

                $spray->sprayedPlant->map(fn($plant)=>[
                    'title'=>$plant->plant->title]),
           
            $spray->detail,           
            $spray->id,
           Time::date( $spray->spray_date)
        );
    }
}
