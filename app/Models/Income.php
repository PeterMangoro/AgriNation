<?php

namespace App\Models;

use App\Builders\IncomeBuilder;
use App\Builders\Shared\SharedScopes;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends SharedModel
{
    use HasFactory;
    use SharedScopes;

    public function price(): MorphOne
    {
        return $this->morphOne(Price::class, 'priceable');
    }

    function gardenIncome()  {
        return $this->hasOne(GardenIncome::class);
    }

    public function newEloquentBuilder($query):IncomeBuilder
    {
        return new IncomeBuilder($query);
    }
}
