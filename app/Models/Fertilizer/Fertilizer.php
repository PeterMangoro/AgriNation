<?php

namespace App\Models\Fertilizer;

use App\Models\Shared\SharedModel;
use App\Builders\FertilizerBuilder;
use App\Models\Fertilizer\FertilizationFertilizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Fertilizer extends SharedModel
{
    use HasFactory;

    public function newEloquentBuilder($query): FertilizerBuilder
    {
        return new FertilizerBuilder($query);
    }

    public function fertilized()
    {
        return $this->hasMany(FertilizationFertilizer::class);
    }
}
