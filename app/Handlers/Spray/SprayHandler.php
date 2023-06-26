<?php
namespace App\Handlers\Spray;

use App\Events\Spray\CreatingSpray;
use App\Http\Requests\Spray\CreateSprayRequest;
use App\DataObjects\Spray\SprayCreateData;

class SprayHandler
{
    public static function store(CreateSprayRequest $request)
    {
        $validated_object = SprayCreateData::fromRequest($request);
        event(new CreatingSpray($validated_object));       
   
    }
}