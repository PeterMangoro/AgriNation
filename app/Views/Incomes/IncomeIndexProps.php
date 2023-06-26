<?php

namespace App\Views\Incomes;

use App\Views\Shared\Filters;
use App\Models\Finance\Income;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Income\IncomeDisplayData;


class IncomeIndexProps extends BaseView
{
    public function incomes()
    {
        return IncomeDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Income()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
