<?php

namespace App\Models\Finance;

use App\Models\Finance\Price;
use App\Models\Shared\SharedModel;
use App\Builders\ExpenditureBuilder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenditure extends SharedModel
{
    use HasFactory;

    public function price(): MorphOne
    {
        return $this->morphOne(Price::class, 'priceable');
    }

    public function newEloquentBuilder($query): ExpenditureBuilder
    {
        return new ExpenditureBuilder($query);
    }
}
