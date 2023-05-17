<?php

namespace App\Models;

use App\Builders\LocationBuilder;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends SharedModel
{
    use HasFactory;

    public function newEloquentBuilder($query): LocationBuilder
    {
        return new LocationBuilder($query);
    }
}
