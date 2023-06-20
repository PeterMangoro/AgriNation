<?php
namespace App\Views\Fertilizations;

use App\Models\Chemical;
use App\Models\Fertilizer\Fertilizer;
use App\Models\Location;
use App\Models\Plant;
use App\Views\Shared\BaseView;

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