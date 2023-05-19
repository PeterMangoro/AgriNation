<?php
namespace App\Actions\Plant;

use Carbon\Carbon;
use App\Models\Plant;
use App\Models\Garden;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PlantLocationAction
{

    public function __construct(
        public Plant $plant ,        
       public  object $validated_request
    )
    {
        $this->plant  = $plant;
        $this->validated_request  = $validated_request;
    }

    public  function addToLocation(
       
        ):void
    {
        $this->plant->plantLocations()->sync($this->validated_request->locations);
        // dd($this->validated_request);
        $this->addToGarden();
       
    }

    public function addToGarden()
    {
        DB::table('gardens')->insertGetId([            
            'user_id' => Auth::user()->id,  
            'plant_id'=> $this->plant->id,  
            'total_plants' => $this->validated_request->total_plants,        
            'detail' => $this->validated_request->detail,  
            'plant_date'=> $this->validated_request->date,
            'batch'=>$this->validated_request->batch,
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }

    public function addToNursery()
    {
        DB::table('nurseries')->insertGetId([            
            'user_id' => Auth::user()->id,  
            'plant_id'=> $this->plant->id,  
            'total_plants' => $this->validated_request->total_plants,        
            'detail' => $this->validated_request->detail,  
            'plant_date'=> $this->validated_request->date,
            'location'=>$this->validated_request->nursery_location,
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }
}