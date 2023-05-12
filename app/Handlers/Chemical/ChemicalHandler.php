<?php
namespace App\Handlers\Chemical;

use App\Events\Chemical\CreatingChemical;
use App\Http\Requests\Chemical\CreateChemicalRequest;
use App\DataObjects\Chemical\ChemicalCreateData;

class ChemicalHandler
{
    public static function store(CreateChemicalRequest $request)
    {
        $validated_object = ChemicalCreateData::fromRequest($request);
        event(new CreatingChemical($validated_object));

       
   
    }
}