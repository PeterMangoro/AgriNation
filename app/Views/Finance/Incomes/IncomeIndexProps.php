<?php

namespace App\Views\Finance\Incomes;

use App\Views\Shared\Filters;
use App\Models\Finance\Income;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Finance\Income\IncomeDisplayData;



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
