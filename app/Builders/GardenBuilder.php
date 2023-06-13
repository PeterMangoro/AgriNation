<?php
namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class GardenBuilder extends Builder
{
    function currentlyHarvesting()  {
        return $this->whereNotNull('start_harvest_date')
        ->whereNull('end_harvest_date');
    }

    function whereActive()  {
        return $this->whereNull('end_harvest_date');
    }

    function harvested() {
        return $this->whereNotNull('end_harvest_date');
    }
}