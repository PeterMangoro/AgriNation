<?php
namespace App\Handlers\Finance\Debit;

use App\Events\Finance\Debit\CreatingDebit;
use App\DataObjects\Finance\Debit\DebitCreateData;
use App\Http\Requests\Finance\Debit\CreateDebitRequest;



class DebitHandler
{
    public static function store(CreateDebitRequest $request)
    {
        $validated_object = DebitCreateData::fromRequest($request);
        event(new CreatingDebit($validated_object));       
   
    }
}