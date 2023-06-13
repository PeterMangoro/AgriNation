<?php
namespace App\ValueObjects;

class GardenDisplay
{
   
    public static  function forPlant(object $garden) : object {
        $garden = $garden->with('plant')->get();  

       return $garden->map(fn ($plant) => [

            'title'=>$plant->plant->title,
           'id'=> $plant->id,
           'batch'=> $plant->batch,
           'total_plants'=> $plant->total_plants

            
        ]);
      
    }

}