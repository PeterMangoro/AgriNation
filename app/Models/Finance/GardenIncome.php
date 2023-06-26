<?php

namespace App\Models\Finance;

use App\Models\Garden\Garden;
use App\Models\Finance\Income;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
