<?php
namespace App\Handlers\Chemical;

use App\Events\Chemical\CreatingChemical;
use App\Events\Chemical\UpdatingChemical;
use App\DataObjects\Chemical\ChemicalCreateData;
use App\DataObjects\Chemical\ChemicalUpdateData;
use App\Http\Requests\Chemical\CreateChemicalRequest;
use App\Http\Requests\Chemical\UpdateChemicalRequest;

class ChemicalHandler
{
    public static function store(CreateChemicalRequest $request)
    {
        $validated_object = ChemicalCreateData::fromRequest($request);
        event(new CreatingChemical($validated_object));      
   
    }

    public static function update(
        UpdateChemicalRequest $request,
        string $uuid
    ) {
        $validated_object = ChemicalUpdateData::fromRequest($request);
        event(
            new UpdatingChemical($validated_object, $uuid)
        );
    }
}