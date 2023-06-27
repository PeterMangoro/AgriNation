<?php

namespace App\Views\Finance\Credits;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Models\Finance\Credit;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Finance\Credit\CreditDisplayData;



class CreditIndexProps extends BaseView
{
    public function credits()
    {
        return CreditDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Credit::belongsToAuthUser()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
