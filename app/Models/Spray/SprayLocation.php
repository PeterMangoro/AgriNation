<?php

namespace App\Models\Spray;

use App\Models\Spray\Spray;
use App\Models\Garden\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SprayLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'spray_id',
        'location_id',       
    ];

    public function spray()
    {
        return $this->belongsTo(Spray::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
