<?php

namespace App\Views\Finance\Debits;

use App\Models\Finance\Debit;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Finance\Debit\DebitDisplayData;



class DebitIndexProps extends BaseView
{
    public function debits()
    {
        return DebitDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                 Debit::orderBy('date','desc')
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
