<?php
namespace App\Views\Sprays;

use App\Models\Garden\Plant;
use App\Models\Spray\Chemical;
use App\Views\Shared\BaseView;
use App\Models\Garden\Location;

class SprayCreateProps extends BaseView
{
    public function chemicals()
    {
        return Chemical::orderBy('title')->get();
    }

    public function plants()
    {
        return Plant::orderBy('title')->get();
    }

    public function locations()
    {
        return Location::orderBy('title')->get();
    }
}