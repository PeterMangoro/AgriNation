<?php

namespace App\Actions\Plant;

use App\Models\Plant;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreatePlantAction
{
    public function handle(object $validated_request): int
    {
        
        if ($this->checkPlantExists($validated_request->title)) {
           return $this->checkPlantExists($validated_request->title);
        }
        
        return DB::table('plants')->insertGetId([            
            'title' => $validated_request->title,            
            'detail' => $validated_request->detail,                    
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }

    public function checkPlantExists(string $terms)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        $check = Plant::where('title_normalized', 'like', $term)                
                ->first();

                if ($check) {
                    return $check->id;
                }

                return null;              


                
       
    }
}
