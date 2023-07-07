<?php

namespace App\Actions\Blog;

class UpdateBlogAction
{
    public static function handle(object $validated_request, object $blog): void
    {
        $blog->title = $validated_request->title;
        $blog->tags = $validated_request->tags;
        $blog->detail =  mb_convert_encoding($validated_request->detail, 'ISO-8859-1','UTF-8',);          
        $blog->save();
    }
}
