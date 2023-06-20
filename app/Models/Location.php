<?php

namespace App\Models;

use App\Models\SprayLocation;
use App\Builders\LocationBuilder;
use App\Models\Fertilizer\FertilizationLocation;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Fertilizer\FertilizationPlant;

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
