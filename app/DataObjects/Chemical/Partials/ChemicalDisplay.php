<?php

namespace App\DataObjects\Chemical\Partials;

class ChemicalDisplay
{
    public function __construct(        
        public  readonly string $title,           
        public  readonly array $detail,   
        public  readonly string $type,       
        public  readonly string $uuid,
    ) {
    }
    public static function data($chemical)
    {
        return new self(
            $chemical->title,
            $chemical->detail,           
            $chemical->type,           
            $chemical->uuid
        );
    }
}
