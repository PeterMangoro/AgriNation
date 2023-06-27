<?php
namespace App\Services\Finance\Debit;

use App\Actions\Finance\Debit\CreateDebitAction;


class DebitService
{
    public static function create(object $request)
    {
        return CreateDebitAction::handle($request);
    }

    public static function forHarvest(object $request, int $debit_id)
    {
        return CreateDebitAction::handleHarvest($request,$debit_id);
    }
}