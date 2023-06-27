<?php
namespace App\Services\Finance\Expenditure;

use App\Actions\Finance\Expenditure\CreateExpenditureAction;


class ExpenditureService
{
    public static function create(object $request)
    {
        return CreateExpenditureAction::handle($request);
    }
}