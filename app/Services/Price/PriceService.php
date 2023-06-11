<?php
namespace App\Services\Price;

use App\Actions\Price\CreatePriceAction;

class PriceService
{
    public static function create(object $request,string $model, int $expenditure_id)
    {
        return CreatePriceAction::handle($request,$model,$expenditure_id);
    }
}