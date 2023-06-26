<?php

namespace App\Models\Spray;

use App\Models\Spray\Spray;
use App\Models\Spray\Chemical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
