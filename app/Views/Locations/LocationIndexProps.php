<?php

namespace App\Views\Locations;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Models\Garden\Location;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Location\LocationDisplayData;



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
