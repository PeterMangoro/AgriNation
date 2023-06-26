<?php

namespace App\Actions\Income;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateIncomeAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('incomes')->insertGetId([
            'detail' => $validated_request->detail,
            'date' => $validated_request->date,
            'created_at' => Carbon::now(),
        ]);
    }

    public static function handleHarvest(object $validated_request, int $income_id): void
    {
        DB::table('garden_incomes')->insert([
            'garden_id' => $validated_request->source,
            'income_id' => $income_id,
            'created_at' => Carbon::now(),
        ]);
    }
}
