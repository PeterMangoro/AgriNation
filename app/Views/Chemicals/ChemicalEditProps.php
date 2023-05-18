<?php
namespace App\Views\Plants;

use App\Models\Plant;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Plant\Partials\PlantForUpdate;

class PlantEditProps
{
    public function __construct(
        public string $uuid,
        public  ?object $plant=null

    )
    {
        $this->plant = PlantForUpdate::from(
            ModelHandler::getModelForEdit(
                new Plant(),
                $this->uuid
            ));
      
    }

    public function plant()
    {       
        return $this->plant();
    }
}