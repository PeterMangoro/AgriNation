<?php

namespace App\Actions\Plant;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreatePlantAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('plants')->insertGetId([            
            'title' => $validated_request->title,            
            'detail' => $validated_request->detail,                    
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }
}
