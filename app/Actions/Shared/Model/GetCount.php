<?php
namespace App\Actions\Shared\Model;

use Illuminate\Database\Eloquent\Model;

class GetCount
{
    public static function totalOf(Model $model):int
    {
       return $model::count();
    }
}