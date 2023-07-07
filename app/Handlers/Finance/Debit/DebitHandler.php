<?php
namespace App\Handlers\Finance\Debit;

use App\Events\Finance\Debit\CreatingDebit;
use App\Events\Finance\Debit\UpdatingDebit;
use App\DataObjects\Finance\Debit\DebitCreateData;
use App\DataObjects\Finance\Debit\DebitUpdateData;
use App\Http\Requests\Finance\Debit\CreateDebitRequest;
use App\Http\Requests\Finance\Debit\UpdateDebitRequest;



class DebitHandler
{
    public static function store(CreateDebitRequest $request)
    {
        $validated_object = DebitCreateData::fromRequest($request);
        event(new CreatingDebit($validated_object));       
   
    }

    public static function update(
        UpdateDebitRequest $request,
        string $uuid
    ) {
        $validated_object = DebitUpdateData::fromRequest($request);
        event(
            new UpdatingDebit($validated_object, $uuid)
        );
    }
}