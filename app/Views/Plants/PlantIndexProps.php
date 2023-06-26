<?php

namespace App\Views\Plants;

use App\Models\Garden\Plant;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Plant\PlantDisplayData;


class PlantIndexProps extends BaseView
{
    public function plants()
    {
        return PlantDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Plant::with('garden')
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
