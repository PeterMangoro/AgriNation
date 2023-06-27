<?php

namespace App\Models\Finance;

use App\Models\Finance\Price;
use App\Models\Shared\SharedModel;
use App\Models\Finance\GardenIncome;
use App\Builders\Finance\DebitBuilder;
use App\Models\Scopes\Finance\ActiveDebtScope;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debit extends SharedModel
{
    use HasFactory;

    protected $table = 'incomes';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveDebtScope);
    }

    public function price(): MorphOne
    {
        return $this->morphOne(Price::class, 'priceable');
    }

    function gardenDebit()  {
        return $this->hasOne(GardenIncome::class,'income_id');
    }
    //foreign_id => reference_id yemodel ino
    //local_id => default id wc auto increments

    public function newEloquentBuilder($query):DebitBuilder
    {
        return new DebitBuilder($query);
    }
}
