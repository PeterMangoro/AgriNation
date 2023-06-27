<?php
namespace App\Services\Finance\Income;

use App\Actions\Finance\Income\CreateIncomeAction;


class IncomeService
{
    public static function create(object $request)
    {
        return CreateIncomeAction::handle($request);
    }

    public static function forHarvest(object $request, int $income_id)
    {
        return CreateIncomeAction::handleHarvest($request,$income_id);
    }
}