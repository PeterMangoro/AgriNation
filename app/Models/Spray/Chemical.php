<?php

namespace App\Models\Spray;

use App\Builders\ChemicalBuilder;
use App\Models\Shared\SharedModel;
use App\Models\Spray\SprayChemical;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chemical extends SharedModel
{
    use HasFactory;

    public function newEloquentBuilder($query): ChemicalBuilder
    {
        return new ChemicalBuilder($query);
    }

    public function sprayed()
    {
        return $this->hasMany(SprayChemical::class);
    }
}
