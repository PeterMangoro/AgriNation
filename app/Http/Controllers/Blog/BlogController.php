<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Handlers\Blog\BlogHandler;
use App\Views\Blogs\BlogEditProps;
use App\Views\Blogs\BlogIndexProps;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
   public function index()
   {
      return inertia('Blog/index', [
         'data' => new BlogIndexProps()
      ]);
   }

   public function create()
   {
      return inertia('Blog/create');
   }

   public function store(CreateBlogRequest $request)
   {
      BlogHandler::store($request);      

      return to_route('blogs.index')->with('flash.banner', 'Blog Added Successfully');
   }

   public function show()
   {
      return inertia('Blog/show');
   }

   public function edit(string $uuid)
   {
      return inertia('Blog/edit',[
         'data'=> new BlogEditProps($uuid)
      ]);
   }

   public function update(UpdateBlogRequest $request,string $uuid)
   {
      BlogHandler::update($request, $uuid);
        return back();
   }

   public function delete()
   {
      return inertia('Blog/index');
   }

}
