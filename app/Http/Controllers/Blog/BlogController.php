<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;

class BlogController extends Controller
{
    function index()  {
        return inertia('Welcome',[
            'data'=>[
                'content'=>'Blog::get()'
            ]
            ]);
    }

    function create()  {
        return inertia('Welcome',[
            'data'=>[
                'content'=>Blog::latest()->first()
            ]
            ]);
    }
    function store(Request $request)  {
        // dd(request('content'));

        $editor_content=$request->content;
//you might want to write your validation code above
// dd($request->content);

$dom = new \DomDocument('1.0', 'UTF-8');
libxml_use_internal_errors(true);
$dom->loadHtml($editor_content);
$images = $dom->getElementsByTagName('imgFile');
foreach ($images as $k => $img) {
    $data = $img->getAttribute('src');
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    $image_name = "/blog/". 'post_' . time() . $k ;
    $path = public_path() . $image_name;
    file_put_contents($path, $data);
    $img->removeAttribute('src');
    $img->setAttribute('src', $image_name);
  };
$editor_content_save= utf8_decode($dom->saveHTML($dom));
//now you can save your editor content into the database with the variable $editor_content_save
        Blog::create([
            'detail'=> $editor_content_save
            // 'detail'=>$request->content
        ]);

        return back();
    }

}
