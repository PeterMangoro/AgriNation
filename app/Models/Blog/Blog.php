<?php

namespace App\Models\Blog;

use App\Builders\BlogBuilder;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends SharedModel
{
    use HasFactory;
    protected $fillable = [
        'detail',
          
    ];

    public function newEloquentBuilder($query):BlogBuilder
    {
        return new BlogBuilder($query);
    }
}
