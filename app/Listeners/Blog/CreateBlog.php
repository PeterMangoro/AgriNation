<?php

namespace App\Listeners\Blog;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Blog\CreatingBlog;
use App\Models\Blog\Blog;
use App\Services\Blog\BlogService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBlog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreatingBlog $event): void
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $blog_id=BlogService::create($request);
        $blog = Blog::find($blog_id);        
        AttachmentService::addImages($request->images, $blog, 'blog',600) ;    
        
        }); 
    }
}
