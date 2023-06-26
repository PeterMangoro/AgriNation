<?php

namespace App\Models\Fertilizer;

use App\Models\Shared\SharedModel;
use App\Models\Fertilizer\FertilizationPlant;
use App\Models\Fertilizer\FertilizationLocation;
use App\Builders\Fertilizer\FertilizationBuilder;
use App\Models\Fertilizer\FertilizationFertilizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Fertilization extends SharedModel
{
    use HasFactory;


    public function fertilizedLocation()
    {
        return $this->hasMany(FertilizationLocation::class);
    }

    public function fertilizedPlant()
    {
        return $this->hasMany(FertilizationPlant::class);
    }

    public function usedFertilizer()
    {
        return $this->hasMany(FertilizationFertilizer::class);
    }

    public function newEloquentBuilder($query):FertilizationBuilder
    {
        return new FertilizationBuilder($query);
    }
}
