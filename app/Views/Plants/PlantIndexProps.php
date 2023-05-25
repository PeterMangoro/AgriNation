<?php

namespace App\Views\Plants;

use App\DataObjects\Plant\PlantDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Plant;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
