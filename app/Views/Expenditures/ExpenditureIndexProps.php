<?php

namespace App\Views\Expenditures;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Models\Finance\Expenditure;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Expenditure\ExpenditureDisplayData;


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
