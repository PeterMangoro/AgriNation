<?php

namespace App\Actions\Spray;

use App\Models\Spray;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateSprayAction
{
    public  function handle(object $validated_request)
    {
        DB::transaction(function () use ($validated_request) {
            $spray_id = $this->createSpray($validated_request);
            $spray = Spray::find($spray_id);

             $this->sprayedLocations($spray,$validated_request->locations);
             $this->sprayedChemicals($spray,$validated_request->chemicals);
             $this->sprayedPlants($spray,$validated_request->plants);
              }); 
    }


    public function createSpray(object $validated_request): int
    {
        return DB::table('sprays')->insertGetId([  
            'user_id' => Auth::user()->id,           
            'uuid' => Str::uuid()->toString(),         
            'detail' => $validated_request->detail,  
            'spray_date' => $validated_request->date,                     
            'created_at' => Carbon::now(),
        ]);
    }

    public function sprayedLocations(Spray $spray,array $locations)
    {       
       foreach ($locations as $location) {
        $spray->sprayedLocation()->create([
            'spray_id'=>$spray->id,
            'location_id'=>$location
        ]);
       }
    }

    public function sprayedChemicals(Spray $spray,array $chemicals)
    {
       foreach ($chemicals as $chemical) {
        $spray->sprayedChemical()->create([
            'spray_id'=>$spray->id,
            'chemical_id'=>$chemical
        ]);
       }
    }

    public function sprayedPlants(Spray $spray,array $plants)
    {
       foreach ($plants as $plant) {
        $spray->sprayedPlant()->create([
            'spray_id'=>$spray->id,
            'plant_id'=>$plant
        ]);
       }
    }



}
