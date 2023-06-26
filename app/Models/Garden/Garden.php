<?php

namespace App\Models\Garden;

use App\Models\Garden\Plant;
use App\Builders\GardenBuilder;
use App\Models\Finance\GardenIncome;
use App\Builders\Shared\SharedScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garden extends Model
{
    use HasFactory;
    use SharedScopes;

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    function gardenIncome()  {
        return $this->hasMany(GardenIncome::class);
    }

    public function newEloquentBuilder($query) : GardenBuilder
    {
        return new GardenBuilder($query);
    }
}
