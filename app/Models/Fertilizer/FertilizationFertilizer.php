<?php

namespace App\Models\Fertilizer;

use App\Models\Fertilizer\Fertilizer;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fertilizer\Fertilization;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FertilizationFertilizer extends Model
{
    use HasFactory;


    protected $fillable = [
        'fertilization_id',
        'fertilizer_id',       
    ];

    public function fertilizer()
    {
        return $this->belongsTo(Fertilizer::class);
    }

    public function fertilization()
    {
        return $this->belongsTo(Fertilization::class);
    }
}
