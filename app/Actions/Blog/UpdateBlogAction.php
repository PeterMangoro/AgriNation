<?php

namespace App\Actions\Blog;

class UpdateBlogAction
{
    public static function handle(object $validated_request, object $blog): void
    {
        $blog->title = $validated_request->title;
        $blog->detail = $validated_request->detail;          
        $blog->save();
    }
}
