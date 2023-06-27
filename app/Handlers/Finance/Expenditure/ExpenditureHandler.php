<?php
namespace App\Handlers\Finance\Expenditure;

use App\Events\Finance\Expenditure\CreatingExpenditure;
use App\DataObjects\Finance\Expenditure\ExpenditureCreateData;
use App\Http\Requests\Finance\Expenditure\CreateExpenditureRequest;


class ExpenditureHandler
{
    public static function store(CreateExpenditureRequest $request)
    {
        $validated_object = ExpenditureCreateData::fromRequest($request);
        event(new CreatingExpenditure($validated_object));      
   
    }
}