<?php
namespace App\DataObjects\Blog;

use App\DataObjects\Blog\Partials\BlogDisplay;

class BlogDisplayData
{
    public static function toWebPage(
        object $blogs
    )
    {
        return $blogs->through(
            fn ($blog)=> BlogDisplay::data($blog)
        );
    }
}