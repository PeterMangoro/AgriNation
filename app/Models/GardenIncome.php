<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GardenIncome extends Model
{
    use HasFactory;

    function income()  {
        return $this->belongsTo(Income::class);
    }

    function garden()  {
        return $this->belongsTo(Garden::class);
    }
}
