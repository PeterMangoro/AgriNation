<?php

namespace App\Models;

use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
