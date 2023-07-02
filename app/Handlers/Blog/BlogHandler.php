<?php
namespace App\Handlers\Blog;

use App\Events\Blog\CreatingBlog;
use App\Events\Blog\UpdatingBlog;
use App\DataObjects\Blog\BlogCreateData;
use App\DataObjects\Blog\BlogUpdateData;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogHandler
{
    public static function store(CreateBlogRequest $request)
    {
        $validated_object = BlogCreateData::fromRequest($request);
        event(new CreatingBlog($validated_object));      
   
    }

    public static function update(
        UpdateBlogRequest $request,
        string $uuid
    ) {
        $validated_object = BlogUpdateData::fromRequest($request);
        event(
            new UpdatingBlog($validated_object, $uuid)
        );
    }
}