<?php
namespace App\Views\Finance\Debits;

use App\Models\Garden\Garden;
use App\Views\Shared\BaseView;
use App\ValueObjects\GardenDisplay;


class DebitCreateProps extends BaseView
{
    function harvest() : object {
        return GardenDisplay::forPlant(Garden::currentlyHarvesting())
                        ;
    }
}