<?php
namespace App\Services\Spray;

use App\Actions\Spray\CreateSprayAction;

class SprayService
{
    public static function create(object $validated_request)
    {
        return (new CreateSprayAction())->handle($validated_request);
    }
}