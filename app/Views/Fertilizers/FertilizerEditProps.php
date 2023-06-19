<?php
namespace App\Views\Fertilizers;

use App\Models\Fertilizer;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Fertilizer\Partials\FertilizerForUpdate;

class FertilizerEditProps
{
    public function __construct(
        public string $uuid,
        public  ?object $fertilizer=null

    )
    {
        $this->fertilizer = FertilizerForUpdate::from(
            ModelHandler::getModelForEdit(
                new Fertilizer(),
                $this->uuid
            ));
      
    }

    public function fertilizer()
    {       
        return $this->fertilizer();
    }
}