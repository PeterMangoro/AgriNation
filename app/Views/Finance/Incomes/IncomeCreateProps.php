<?php
namespace App\Views\Finance\Incomes;

use App\Models\Garden\Garden;
use App\Views\Shared\BaseView;
use App\ValueObjects\GardenDisplay;


class IncomeCreateProps extends BaseView
{
    function harvest() : object {
        return GardenDisplay::forPlant(Garden::currentlyHarvesting())
                        ;
    }
}