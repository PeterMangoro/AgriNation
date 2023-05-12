<?php

namespace App\Views\Chemicals;

use App\DataObjects\Chemical\ChemicalDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Chemical;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
