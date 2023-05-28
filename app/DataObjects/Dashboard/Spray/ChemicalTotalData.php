<?php
namespace App\DataObjects\Dashboard\Spray;

use App\Models\Garden;

class ChemicalTotalData
{
    public function __construct(
        public int $belt,
        public int $malathion,
         public int $carbaryl,
        public int $harvested_plants,
        // public int $total_harvested_plants_this_year,
     
    )
    {        
    }

    public static function of()
    {
    //    $total_plants = Garden::sum('total_plants');
        return new static (
            Garden::sum('total_plants'),
            Garden::whereNull('end_harvest_date')->sum('total_plants'),
            Garden::whereNotNull('start_harvest_date')->whereNull('end_harvest_date')->sum('total_plants'),
            Garden::whereNotNull('end_harvest_date')->sum('total_plants'),
            // Garden::whereNotNull('end_harvest_date')->where('end_harvest_date','>',)->sum('total_plants'),
        )
       

            
         ;
    }
}  