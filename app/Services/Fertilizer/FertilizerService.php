<?php
namespace App\Services\Fertilizer;

use App\Actions\Fertilizer\CreateFertilizerAction;
use App\Actions\Fertilizer\UpdateFertilizerAction;

class FertilizerService
{
    public static function create(object $request)
    {
        return CreateFertilizerAction::handle($request);
    }

    public static function update(object $request, object $fertilizer)
    {
        return UpdateFertilizerAction::handle($request, $fertilizer);
    }
}