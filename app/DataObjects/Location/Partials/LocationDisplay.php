<?php

namespace App\DataObjects\Location\Partials;

class LocationDisplay
{
    public function __construct(        
        public  readonly string $title,           
        public  readonly array $detail,   
        public  readonly string $area,       
        public  readonly string $uuid,
    ) {
    }
    public static function data($location)
    {
        return new self(
            $location->title,
            $location->detail,           
            $location->area,           
            $location->uuid
        );
    }
}
