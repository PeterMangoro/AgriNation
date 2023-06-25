<?php
namespace App\Views\Dashboard;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\DataObjects\Shared\TotalOfData;
use App\DataObjects\Dashboard\PlantTotalData;
use App\DataObjects\Dashboard\IncomeTotalData;
use App\DataObjects\Dashboard\ExpenditureTotalData;
use App\DataObjects\Dashboard\Spray\SprayTotalData;
use App\DataObjects\Dashboard\Fertilizer\ApplicationTotalData;

class DashboardIndexProps extends BaseView
{
    public function expenditure()
    {
        return ExpenditureTotalData::of();
    }

    public function income()
    {
        return IncomeTotalData::of();
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

            'chemicals'=>SprayTotalData::ofChemical(),
            'plants'=>SprayTotalData::ofPlant(),
            'locations'=>SprayTotalData::ofLocation(),
        
        ];
    }


    public function totalApplicationOf()
    {
        return [

            'fertilizers'=>ApplicationTotalData::ofFertilizer(),
            'plants'=>ApplicationTotalData::ofPlant(),
            'locations'=>ApplicationTotalData::ofLocation(),
        
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}