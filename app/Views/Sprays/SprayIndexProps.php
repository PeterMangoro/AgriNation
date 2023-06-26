<?php

namespace App\Views\Sprays;

use App\Models\Spray\Spray;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Spray\SprayDisplayData;

class SprayIndexProps extends BaseView
{
    public function sprays()
    {
        return SprayDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Spray::belongsToAuthUser()
                            // ->with(
                                // 'sprayedChemical.chemical',
                                // 'sprayedLocation.location',
                                // 'sprayedPlant.plant'
                                // ),
                                ,4
                                
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
