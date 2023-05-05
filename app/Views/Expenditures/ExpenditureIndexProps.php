<?php

namespace App\Views\Expenditures;

use App\DataObjects\Expenditure\ExpenditureDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Expenditure;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class ExpenditureIndexProps extends BaseView
{
    public function expenditures()
    {
        return ExpenditureDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Expenditure::belongsToAuthUser()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
