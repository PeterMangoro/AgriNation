<?php
namespace App\Services\Blog;

use App\Actions\Blog\CreateBlogAction;
use App\Actions\Blog\UpdateBlogAction;

class BlogService
{
    public static function create(object $request)
    {
        return (new CreateBlogAction())->handle($request);
    }

    public static function update(object $request, object $blog)
    {
        return UpdateBlogAction::handle($request, $blog);
    }
}