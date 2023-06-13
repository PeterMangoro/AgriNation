<?php
namespace App\Views\Incomes;

use App\Models\Garden;
use App\ValueObjects\GardenDisplay;
use App\Views\Shared\BaseView;

class IncomeCreateProps extends BaseView
{
    function harvest() : object {
        return GardenDisplay::forPlant(Garden::currentlyHarvesting())
                        ;
    }
}