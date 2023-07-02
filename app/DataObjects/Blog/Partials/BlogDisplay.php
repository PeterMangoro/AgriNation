<?php

namespace App\DataObjects\Blog\Partials;

class BlogDisplay
{
    public function __construct(        
        public  readonly string $title,           
        public  readonly array $detail,      
        public  readonly string $uuid,
    ) {
    }
    public static function data($blog)
    {
        return new self(
            $blog->title,
            $blog->detail,                    
            $blog->uuid
        );
    }
}
