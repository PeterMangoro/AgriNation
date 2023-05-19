<?php

namespace App\Models;

use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantLocation extends SharedModel
{
    use HasFactory;

    public function plants()
    {
        return $this->belongsToMany(Plant::class,'plant_locations','location_id','plant_id');
    }
}
