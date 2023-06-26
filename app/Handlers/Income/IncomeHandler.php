<?php
namespace App\Handlers\Income;

use App\Events\Income\CreatingIncome;
use App\Http\Requests\Income\CreateIncomeRequest;
use App\DataObjects\Income\IncomeCreateData;

class IncomeHandler
{
    public static function store(CreateIncomeRequest $request)
    {
        $validated_object = IncomeCreateData::fromRequest($request);
        event(new CreatingIncome($validated_object));       
   
    }
}