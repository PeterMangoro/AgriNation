<?php

namespace App\Models\Spray;

use App\Builders\SprayBuilder;
use App\Models\Spray\SprayPlant;
use App\Models\Shared\SharedModel;
use App\Models\Spray\SprayChemical;
use App\Models\Spray\SprayLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spray extends SharedModel
{
    use HasFactory;

    public function sprayedLocation()
    {
        return $this->hasMany(SprayLocation::class);
    }

    public function sprayedPlant()
    {
        return $this->hasMany(SprayPlant::class);
    }

    public function sprayedChemical()
    {
        return $this->hasMany(SprayChemical::class);
    }

    public function newEloquentBuilder($query):SprayBuilder
    {
        return new SprayBuilder($query);
    }
}
