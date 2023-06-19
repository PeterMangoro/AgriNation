<?php

namespace App\Models;

use App\Builders\FertilizerBuilder;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fertilizer extends SharedModel
{
    use HasFactory;

    public function newEloquentBuilder($query): FertilizerBuilder
    {
        return new FertilizerBuilder($query);
    }

    public function applied()
    {
        return $this->hasMany(SprayFertilizer::class);
    }
}
