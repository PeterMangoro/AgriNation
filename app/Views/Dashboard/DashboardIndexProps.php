<?php
namespace App\Views\Dashboard;

use App\Views\Shared\BaseView;
use App\DataObjects\Shared\TotalOfData;
use App\DataObjects\Dashboard\ExpenditureTotalData;

class DashboardIndexProps extends BaseView
{
    public function expenditure()
    {
        return ExpenditureTotalData::of();
    }

    public function totalOf()
    {
        return TotalOfData::counts();        
    }
   
}