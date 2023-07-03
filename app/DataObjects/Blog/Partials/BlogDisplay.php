<?php

namespace App\DataObjects\Blog\Partials;

use App\ValueObjects\Attachments;
use App\ValueObjects\Time;

class BlogDisplay
{
    public function __construct(        
        public  readonly string $title,           
        public  readonly array $detail,      
        public  readonly string $uuid,
        public  readonly string $date,
        public  readonly string $image,
        public  readonly string $id,
    ) {
    }
    public static function data($blog)
    {
        // dd(Attachments::imagesForDisplay($blog));
        return new self(
            $blog->title,
            $blog->detail,                    
            $blog->uuid,
            Time::date($blog->created_at),
            Attachments::imagesForDisplay($blog),
            $blog->id,
        );
    }
}
