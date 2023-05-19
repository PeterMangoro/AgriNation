<?php

namespace App\Models;

use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends SharedModel
{
    use HasFactory;

    public function plantLocations()
    {
        return $this->belongsToMany(PlantLocation::class,'plant_locations','plant_id','location_id');
    }
}
