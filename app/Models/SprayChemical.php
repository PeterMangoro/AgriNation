<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprayChemical extends Model
{
    use HasFactory;

    protected $fillable = [
        'spray_id',
        'chemical_id',       
    ];

    public function spray()
    {
        return $this->belongsTo(Spray::class);
    }

    public function chemical()
    {
        return $this->belongsTo(Chemical::class);
    }
}
