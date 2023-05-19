<?php

namespace App\Views\Sprays;

use App\DataObjects\Spray\SprayDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Spray;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class SprayIndexProps extends BaseView
{
    public function sprays()
    {
        return SprayDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Spray::belongsToAuthUser()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}