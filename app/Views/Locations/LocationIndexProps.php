<?php

namespace App\Views\Locations;

use App\DataObjects\Location\LocationDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Location;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class LocationIndexProps extends BaseView
{
    public function locations()
    {
        return LocationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Location()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
