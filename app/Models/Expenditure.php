<?php

namespace App\Models;

use App\Models\Shared\SharedModel;
use App\Builders\ExpenditureBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenditure extends SharedModel
{
    use HasFactory;

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function newEloquentBuilder($query): ExpenditureBuilder
    {
        return new ExpenditureBuilder($query);
    }
}
