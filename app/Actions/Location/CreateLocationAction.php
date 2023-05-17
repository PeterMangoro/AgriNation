<?php

namespace App\Actions\Location;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateLocationAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('locations')->insertGetId([            
            'title' => $validated_request->title,            
            'detail' => $validated_request->detail,
            'area' => $validated_request->area,            
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
            'user_id' => Auth::user()->id
        ]);
    }
}
