<?php
namespace App\Views\Chemicals;

use App\Models\Chemical;

class ChemicalEditProps
{
    public function __construct(
        public readonly Chemical $chemical
    )
    {
      
    }

    public function chemical()
    {
        return $this->chemical();
    }
}