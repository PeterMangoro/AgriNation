<?php
namespace App\DataObjects\Dashboard;

use App\Models\Garden;

class PlantTotalData
{
    public function __construct(
        public int $all_plants,
        public int $active_plants,
         public int $currently_harvesting_plants,
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