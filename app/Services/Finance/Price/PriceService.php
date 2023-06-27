<?php
namespace App\Services\Finance\Price;

use App\Actions\Finance\Price\CreatePriceAction;


class PriceService
{
    public static function create(object $request,string $model, int $expenditure_id)
    {
        return CreatePriceAction::handle($request,$model,$expenditure_id);
    }
}