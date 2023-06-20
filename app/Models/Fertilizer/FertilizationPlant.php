<?php

namespace App\Models\Fertilizer;


use App\Models\Plant;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fertilizer\Fertilization;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FertilizationPlant extends Model
{
    use HasFactory;

    protected $fillable = [
        'fertilization_id',
        'plant_id',       
    ];

    public function fertilization()
    {
        return $this->belongsTo(Fertilization::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
