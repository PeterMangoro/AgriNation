<?php

namespace App\Models\Finance;

use App\Models\Finance\Price;
use App\Models\Shared\SharedModel;
use App\Builders\Finance\CreditBuilder;
use App\Models\Scopes\Finance\ActiveDebtScope;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Credit extends SharedModel
{
    use HasFactory;

    protected $table = 'expenditures';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveDebtScope);
    }

    public function price(): MorphOne
    {
        return $this->morphOne(Price::class, 'priceable');
    }

    public function newEloquentBuilder($query): CreditBuilder
    {
        return new CreditBuilder($query);
    }
}
