<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Builders\ChemicalBuilder;
use App\Models\Shared\SharedModel;

class Chemical extends SharedModel
{
    use HasFactory;

    public function newEloquentBuilder($query): ChemicalBuilder
    {
        return new ChemicalBuilder($query);
    }
}
