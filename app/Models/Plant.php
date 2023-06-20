<?php

namespace App\Models;

use App\Models\Garden;
use App\Models\Nursery;
use App\Models\SprayPlant;
use App\Models\PlantLocation;
use App\Builders\PlantBuilder;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fertilizer\FertilizationPlant;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends SharedModel
{
    use HasFactory;

    public function plantLocations()
    {
        return $this->belongsToMany(PlantLocation::class,'plant_locations','plant_id','location_id');
    }

    public function garden()
    {
        return $this->hasMany(Garden::class);
    }

    public function nursery()
    {
        return $this->hasMany(Nursery::class);
    }

    public function sprayed()
    {
        return $this->hasMany(SprayPlant::class);
    }

    public function fertilized()
    {
        return $this->hasMany(FertilizationPlant::class);
    }

    public function newEloquentBuilder($query): PlantBuilder
    {
        return new PlantBuilder($query);
    }
}
