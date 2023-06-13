<?php

namespace App\Models;

use App\Builders\GardenBuilder;
use App\Builders\Shared\SharedScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
