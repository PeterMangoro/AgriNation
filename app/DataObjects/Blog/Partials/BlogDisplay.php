<?php

namespace App\DataObjects\Blog\Partials;

use App\ValueObjects\Attachments;
use App\ValueObjects\MakePoints;
use App\ValueObjects\Time;

class BlogDisplay
{
    public function __construct(        
        public  readonly string $title,           
           
        public  readonly string $uuid,
        public  readonly string $date,
        public  readonly string $image,
        public  readonly string $id,
        public  readonly array $tags, 
    ) {
    }
    public static function data($blog)
    {
        // dd(Attachments::imagesForDisplay($blog));
        return new self(
            $blog->title,                             
            $blog->uuid,
            Time::date($blog->created_at),
            Attachments::imagesForDisplay($blog),
            $blog->id,
            MakePoints::from($blog->tags),
            
        );
    }
}
