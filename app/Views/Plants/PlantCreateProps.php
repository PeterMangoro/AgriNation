<?php
namespace App\Views\Plants;

use App\Views\Shared\BaseView;
use App\Models\Garden\Location;

class PlantCreateProps extends BaseView
{
    public function locations()
    {
        return Location::get();
    }

}