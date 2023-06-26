<?php

namespace App\Models\Finance;

use App\Models\Finance\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrencyRate extends Model
{
    use HasFactory;

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
