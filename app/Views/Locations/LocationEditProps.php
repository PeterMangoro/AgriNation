<?php
namespace App\Views\Locations;

use App\Models\Location;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Location\Partials\LocationForUpdate;

class LocationEditProps
{
    public function __construct(
        public string $uuid,
        public  ?object $location=null

    )
    {
        $this->location = LocationForUpdate::from(
            ModelHandler::getModelForEdit(
                new Location(),
                $this->uuid
            ));
      
    }

    public function location()
    {       
        return $this->location();
    }
}