<?php

namespace App\DataObjects\Plant\Partials;

class PlantDisplay
{
    public function __construct(        
        public  readonly string $title,           
        public  readonly array $detail,   
        public  readonly string $batch,       
        public  readonly string $uuid,
        public  readonly string $date,
        public  readonly string $plant_count,
    ) {
    }
    public static function data($plant)
    {
        return new self(
            $plant->title,
            $plant->detail,           
            $plant->batch,           
            $plant->uuid,
            $plant->date,
            $plant->plant_count
        );
    }
}
