<?php

namespace App\Views\Blogs;

use App\Views\Shared\Filters;
use App\Models\Blog\Blog;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Blog\BlogDisplayData;


class BlogIndexProps extends BaseView
{
    public function blogs()
    {
        return BlogDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Blog()
                    
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
