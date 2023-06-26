<?php

namespace App\Models\Garden;

use App\Builders\LocationBuilder;
use App\Models\Shared\SharedModel;
use App\Models\Spray\SprayLocation;
use App\Models\Fertilizer\FertilizationLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Location extends SharedModel
{
    use HasFactory;

    public function sprayed()
    {
        return $this->hasMany(SprayLocation::class);
    }

    public function fertilized()
    {
        return $this->hasMany(FertilizationLocation::class);
    }

    public function newEloquentBuilder($query): LocationBuilder
    {
        return new LocationBuilder($query);
    }
}
