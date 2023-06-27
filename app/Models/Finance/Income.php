<?php

namespace App\Models\Finance;

use App\Models\Finance\Price;
use App\Models\Shared\SharedModel;
use App\Models\Finance\GardenIncome;
use App\Builders\Shared\SharedScopes;
use App\Builders\Finance\IncomeBuilder;
use App\Models\Scopes\Finance\NullDebtScope;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends SharedModel
{
    use HasFactory;
    use SharedScopes;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new NullDebtScope);
    }

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
