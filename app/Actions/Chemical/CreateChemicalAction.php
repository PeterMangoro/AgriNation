<?php

namespace App\Actions\Chemical;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateChemicalAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('chemicals')->insertGetId([            
            'title' => $validated_request->title,            
            'detail' => $validated_request->detail,
            'type' => $validated_request->type,            
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }
}
