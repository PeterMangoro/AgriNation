<?php

namespace App\DataObjects\Plant\Partials;

use App\ValueObjects\Time;

class PlantDisplay
{
    public function __construct(
        public  readonly string $title,
        public  readonly array $detail,
        public  readonly string $batch,
        public  readonly string $uuid,
        public  readonly ?string $date,
        public  readonly ?string $total_plants,
    ) {
    }
    public static function data($plant)
    {
        // dd(($plant->garden[0]->batch));

        return new self(
            $plant->title,
            $plant->detail,
            count($plant->garden)
            ? $plant->garden[0]->batch : 'n/a',
            $plant->uuid,
            count($plant->garden)
            ? Time::date($plant->garden[0]->plant_date) : Time::date($plant->nursery[0]->plant_date),
            count($plant->garden) 
            ? $plant->garden[0]->total_plants : $plant->nursery[0]->total_plants
        );
    }
}
