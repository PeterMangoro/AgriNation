<?php
namespace App\Views\Blogs;

use App\Models\Blog\Blog;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Blog\Partials\BlogForUpdate;

class BlogEditProps
{
    public function __construct(
        public string $uuid,
        public  ?object $blog=null

    )
    {
        $this->blog = BlogForUpdate::from(
            ModelHandler::getModelForEdit(
                new Blog(),
                $this->uuid
            ));
      
    }

    public function blog()
    {       
        return $this->blog();
    }
}