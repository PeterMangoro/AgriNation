<?php

namespace App\Views\Incomes;

use App\DataObjects\Income\IncomeDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Income;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
