<?php
namespace App\Views\Finance\Debits;

use App\Models\Finance\Debit;
use App\Models\Garden\Garden;
use App\ValueObjects\GardenDisplay;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Finance\Debit\Partials\DebitForUpdate;
use App\Views\Shared\BaseView;

class DebitEditProps 
{
    public function __construct(
        public string $uuid,
        public  ?object $debit=null,
        public  ?object $harvest=null
        

    )
    {
        $this->debit = DebitForUpdate::from(
            ModelHandler::getModelForEdit(
                new Debit(),
                $this->uuid
            ));

            $this->harvest = GardenDisplay::forPlant(Garden::currentlyHarvesting()) ;
      
    }

    

   
}