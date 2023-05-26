<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
