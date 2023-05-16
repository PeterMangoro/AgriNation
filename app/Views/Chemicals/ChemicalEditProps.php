<?php
namespace App\Views\Chemicals;

use App\Models\Chemical;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Chemical\Partials\ChemicalForUpdate;

class ChemicalEditProps
{
    public function __construct(
        public string $uuid,
        public  ?object $chemical=null

    )
    {
        $this->chemical = ChemicalForUpdate::from(
            ModelHandler::getModelForEdit(
                new Chemical(),
                $this->uuid
            ));
      
    }

    public function chemical()
    {       
        return $this->chemical();
    }
}