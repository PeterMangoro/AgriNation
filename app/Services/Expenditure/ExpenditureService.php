<?php
namespace App\Services\Expenditure;

use App\Actions\Expenditure\CreateExpenditureAction;

class ExpenditureService
{
    public static function create(object $request)
    {
        return CreateExpenditureAction::handle($request);
    }
}