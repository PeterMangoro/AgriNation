<?php
namespace App\Handlers\Finance\Income;

use App\Events\Finance\Income\CreatingIncome;
use App\DataObjects\Finance\Income\IncomeCreateData;
use App\Http\Requests\Finance\Income\CreateIncomeRequest;


class IncomeHandler
{
    public static function store(CreateIncomeRequest $request)
    {
        $validated_object = IncomeCreateData::fromRequest($request);
        event(new CreatingIncome($validated_object));       
   
    }
}