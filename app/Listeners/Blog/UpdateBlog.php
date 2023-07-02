<?php

namespace App\Listeners\Blog;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Blog\UpdatingBlog;
use App\Services\Blog\BlogService;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateBlog
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
    public function handle(UpdatingBlog $event): void
    {
        $request = $event->validated_request;
        $blog = $event->blog;

        DB::transaction(function () use ($request, $blog) {
            BlogService::update($request, $blog);            
          
        });
    }
}
