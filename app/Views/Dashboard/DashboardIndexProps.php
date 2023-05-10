<?php
namespace App\Views\Dashboard;

use App\Actions\Expenditure\GetTotal;
use App\DataObjects\Dashboard\ExpenditureTotalData;
use App\Views\Shared\BaseView;

class DashboardIndexProps extends BaseView
{
    public function expenditure()
    {
        return ExpenditureTotalData::of();
    }
}