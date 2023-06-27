<?php

namespace App\Actions\Finance\Debit;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateDebitAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('incomes')->insertGetId([
            'detail' => $validated_request->detail,
            'date' => $validated_request->date,
            'created_at' => Carbon::now(),
            'debt' => true,
        ]);
    }

    public static function handleHarvest(object $validated_request, int $debit_id): void
    {
        DB::table('garden_incomes')->insert([
            'garden_id' => $validated_request->source,
            'income_id' => $debit_id,
            'created_at' => Carbon::now(),
        ]);
    }
}
