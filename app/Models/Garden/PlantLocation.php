<?php

namespace App\Models\Garden;

use App\Models\Garden\Plant;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlantLocation extends SharedModel
{
    use HasFactory;

    public function plants()
    {
        return $this->belongsToMany(Plant::class,'plant_locations','location_id','plant_id');
    }
}
