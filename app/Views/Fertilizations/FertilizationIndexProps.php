<?php

namespace App\Views\Fertilizations;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;

use App\Handlers\Shared\ModelHandler;
use App\Models\Fertilizer\Fertilization;
use App\DataObjects\Fertilization\FertilizationDisplayData;

class FertilizationIndexProps extends BaseView
{
    public function fertilizations()
    {
        return FertilizationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Fertilization::belongsToAuthUser()
                ->orderBy('fertilization_date','desc')                
                            // ->with(
                                // 'usedFertilizer.fertilizer',
                                // 'fertilizedLocation.location',
                                // 'fertilizedPlant.plant'
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
