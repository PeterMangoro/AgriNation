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
    public static function addToLocation(
        Plant $plant ,        
        object $validated_request
        ):void
    {
        $plant->plantLocations()->sync($validated_request->locations);
        
        DB::table('gardens')->insertGetId([            
            'user_id' => Auth::user()->id,  
            'plant_id'=> $plant->id,  
            'total_plants' => $validated_request->total_plants,        
            'detail' => $validated_request->detail,  
            'plant_date'=> $validated_request->date,
            'batch'=>$validated_request->batch,
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }
}