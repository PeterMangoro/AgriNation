<?php
namespace App\Services\Chemical;

use App\Actions\Chemical\CreateChemicalAction;

class ChemicalService
{
    public static function create(object $request)
    {
        return CreateChemicalAction::handle($request);
    }
}