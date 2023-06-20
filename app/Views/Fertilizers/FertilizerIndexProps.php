<?php

namespace App\Views\Fertilizers;

use App\DataObjects\Fertilizer\FertilizerDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Fertilizer\Fertilizer;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class FertilizerIndexProps extends BaseView
{
    public function fertilizers()
    {
        return FertilizerDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Fertilizer()

            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
