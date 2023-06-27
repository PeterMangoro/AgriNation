<?php
namespace App\Services\Finance\Credit;

use App\Actions\Finance\Credit\CreateCreditAction;


class CreditService
{
    public static function create(object $request)
    {
        return CreateCreditAction::handle($request);
    }
}