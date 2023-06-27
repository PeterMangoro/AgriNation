<?php

namespace App\Actions\Finance\Expenditure;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateExpenditureAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('expenditures')->insertGetId([
            'user_id' => Auth::user()->id,
            'title' => $validated_request->title,
            'quantity' => $validated_request->quantity,
            'units' => $validated_request->units,
            'detail' => $validated_request->detail,
            'shop' => $validated_request->shop,
            'date' => $validated_request->date,
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }
}
