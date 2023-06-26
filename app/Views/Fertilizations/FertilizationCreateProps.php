<?php
namespace App\Views\Fertilizations;

use App\Models\Garden\Plant;
use App\Views\Shared\BaseView;
use App\Models\Garden\Location;
use App\Models\Fertilizer\Fertilizer;


class FertilizationCreateProps extends BaseView
{
    public function fertilizers()
    {
        return Fertilizer::orderBy('title')->get();
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