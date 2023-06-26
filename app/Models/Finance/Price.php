<?php

namespace App\Models\Finance;

use App\Models\Finance\CurrencyRate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;

    public function priceable(): MorphTo
    {
        return $this->morphTo();
    }

    public function rate()
    {
        return $this->hasOne(CurrencyRate::class);
    }
}
