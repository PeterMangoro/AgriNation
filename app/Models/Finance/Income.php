<?php

namespace App\Models\Finance;

use App\Models\Finance\Price;
use App\Builders\IncomeBuilder;
use App\Models\Shared\SharedModel;
use App\Builders\Shared\SharedScopes;
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
