<?php

namespace App\DataObjects\Blog\Partials;

class BlogForUpdate
{
    public function __construct(
        public readonly  string $uuid,              
        public  readonly array $detail,
        public  readonly int $id,       
        public  readonly string $title,       
    ) {
    }

    public static function from(object $blog)
    {
        return new self(
            $blog->uuid,                        
            $blog->detail,
            $blog->id,
            $blog->title,           
        );
    }
}
