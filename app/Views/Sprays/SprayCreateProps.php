<?php
namespace App\Views\Sprays;

use App\Models\Chemical;
use App\Models\Location;
use App\Models\Plant;
use App\Views\Shared\BaseView;

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