<?php
namespace App\Services\Income;

use App\Actions\Income\CreateIncomeAction;

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