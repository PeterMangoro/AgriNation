<?php
namespace App\Services\Chemical;

use App\Actions\Chemical\CreateChemicalAction;
use App\Actions\Chemical\UpdateChemicalAction;

class ChemicalService
{
    public static function create(object $request)
    {
        return CreateChemicalAction::handle($request);
    }

    public static function update(object $request, object $chemical)
    {
        return UpdateChemicalAction::handle($request, $chemical);
    }
}