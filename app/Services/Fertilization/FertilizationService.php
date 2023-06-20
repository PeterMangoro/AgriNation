<?php
namespace App\Services\Fertilization;

use App\Actions\Fertilization\CreateFertilizationAction;

class FertilizationService
{
    public static function create(object $validated_request)
    {
        return (new CreateFertilizationAction())->handle($validated_request);
    }
}