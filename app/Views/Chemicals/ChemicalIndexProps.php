<?php

namespace App\Views\Chemicals;

use App\Views\Shared\Filters;
use App\Models\Spray\Chemical;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Chemical\ChemicalDisplayData;


class ChemicalIndexProps extends BaseView
{
    public function chemicals()
    {
        return ChemicalDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Chemical()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
