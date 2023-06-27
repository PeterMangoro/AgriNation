<?php
namespace App\Handlers\Finance\Credit;

use App\Events\Finance\Credit\CreatingCredit;
use App\DataObjects\Finance\Credit\CreditCreateData;
use App\Http\Requests\Finance\Credit\CreateCreditRequest;


class CreditHandler
{
    public static function store(CreateCreditRequest $request)
    {
        $validated_object = CreditCreateData::fromRequest($request);
        event(new CreatingCredit($validated_object));      
   
    }
}