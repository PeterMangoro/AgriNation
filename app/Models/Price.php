<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public function expenditure()
    {
        return $this->belongsTo(Expenditure::class);
    }

    public function rate()
    {
        return $this->hasOne(CurrencyRate::class);
    }
}
