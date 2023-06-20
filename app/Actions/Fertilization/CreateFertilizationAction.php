<?php

namespace App\Actions\Fertilization;


use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Fertilizer\Fertilization;



class CreateFertilizationAction
{
    public  function handle(object $validated_request)
    {
        DB::transaction(function () use ($validated_request) {
            $fertilization_id = $this->createFertilization($validated_request);
            $fertilization = Fertilization::find($fertilization_id);

             $this->FertilizedLocations($fertilization,$validated_request->locations);
             $this->UsedFertilizers($fertilization,$validated_request->fertilizers);
             $this->FertilizedPlants($fertilization,$validated_request->plants);
              }); 
    }


    public function createFertilization(object $validated_request): int
    {
        return DB::table('fertilizations')->insertGetId([  
            'user_id' => Auth::user()->id,           
            'uuid' => Str::uuid()->toString(),         
            'detail' => $validated_request->detail,  
            'fertilization_date' => $validated_request->date,                     
            'created_at' => Carbon::now(),
        ]);
    }

    public function FertilizedLocations(Fertilization $fertilization,array $locations)
    {       
       foreach ($locations as $location) {
        $fertilization->FertilizedLocation()->create([
            'fertilization_id'=>$fertilization->id,
            'location_id'=>$location
        ]);
       }
    }

    public function UsedFertilizers(Fertilization $fertilization,array $fertilizers)
    {
        // dd($fertilization->id);
       foreach ($fertilizers as $fertilizer) {
        // dd($fertilization->id);
        $fertilization->UsedFertilizer()->create([
            'fertilization_id'=>$fertilization->id,
            'fertilizer_id'=>$fertilizer
        ]);
       }
    }

    public function FertilizedPlants(Fertilization $fertilization,array $plants)
    {
       foreach ($plants as $plant) {
        $fertilization->FertilizedPlant()->create([
            'fertilization_id'=>$fertilization->id,
            'plant_id'=>$plant
        ]);
       }
    }



}
