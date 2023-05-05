<?php
namespace App\Services\Price;

use App\Actions\Price\CreatePriceAction;

class PriceService
{
    public static function create(object $request, int $expenditure_id)
    {
        return CreatePriceAction::handle($request,$expenditure_id);
    }
}