<?php
namespace App\Views\Dashboard;

use App\Views\Shared\BaseView;
use App\DataObjects\Shared\TotalOfData;
use App\DataObjects\Dashboard\PlantTotalData;
use App\DataObjects\Dashboard\SprayTotalData;
use App\DataObjects\Dashboard\ExpenditureTotalData;
use App\DataObjects\Dashboard\Spray\SprayTotalData as SpraySprayTotalData;

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
   
    public function plantTotalOf()
    {
        return PlantTotalData::of();
    }

    public function totalSprayOf()
    {
        return [

            'chemicals'=>SpraySprayTotalData::ofChemical(),
            'plants'=>SpraySprayTotalData::ofPlant(),
            'locations'=>SpraySprayTotalData::ofLocation(),
        
        ];
    }
}