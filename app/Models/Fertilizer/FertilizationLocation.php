<?php

namespace App\Models\Fertilizer;

use App\Models\Garden\Location;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fertilizer\Fertilization;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FertilizationLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'fertilization_id',
        'location_id',       
    ];

    public function fertilization()
    {
        return $this->belongsTo(Fertilization::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
