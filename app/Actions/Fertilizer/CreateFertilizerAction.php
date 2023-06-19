<?php

namespace App\Actions\Fertilizer;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateFertilizerAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('fertilizers')->insertGetId([            
            'title' => $validated_request->title,            
            'detail' => $validated_request->detail,
            'type' => $validated_request->type,            
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }
}
