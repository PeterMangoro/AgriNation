<?php

namespace App\Models\Spray;

use App\Models\Spray\Spray;
use App\Models\Garden\Plant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SprayPlant extends Model
{
    use HasFactory;

    protected $fillable = [
        'spray_id',
        'plant_id',       
    ];

    public function spray()
    {
        return $this->belongsTo(Spray::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
