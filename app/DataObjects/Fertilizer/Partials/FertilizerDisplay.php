<?php

namespace App\DataObjects\Fertilizer\Partials;

class FertilizerDisplay
{
    public function __construct(        
        public  readonly string $title,           
        public  readonly array $detail,   
        public  readonly string $type,       
        public  readonly string $uuid,
    ) {
    }
    public static function data($fertilizer)
    {
        return new self(
            $fertilizer->title,
            $fertilizer->detail,           
            $fertilizer->type,           
            $fertilizer->uuid
        );
    }
}
