<?php
namespace App\Views\Plants;

use App\Models\Location;
use App\Views\Shared\BaseView;

class PlantCreateProps extends BaseView
{
    public function locations()
    {
        return Location::get();
    }

}