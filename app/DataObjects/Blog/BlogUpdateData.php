<?php

namespace App\DataObjects\Blog;

class BlogUpdateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $detail, 
        public readonly array $images,  
       
    ) {
    }
    public static function fromRequest($request)
    {
       
        return new self(
            $request->title,
            $request->detail,
            $request->images,
        );
    }
}
