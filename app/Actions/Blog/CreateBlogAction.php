<?php

namespace App\Actions\Blog;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateBlogAction
{
    public  function handle(object $validated_request): int
    {
        $editor_content = $validated_request->detail;

        $dom = new \DomDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $dom->loadHtml($editor_content);
        $this->handleImages($dom);

        $editor_content_save = mb_convert_encoding($dom->saveHTML($dom), 'ISO-8859-1','UTF-8',);
        
        $editor_content_save = ($dom->saveHTML($dom));
        return DB::table('blogs')->insertGetId([
            'title' => $validated_request->title,
            'tags' => $validated_request->tags,
            'detail' =>  $editor_content_save,
            'created_at' => Carbon::now(),
            'uuid' => Str::uuid()->toString(),
        ]);
    }

    public function handleImages($dom): void
    {
        $images = $dom->getElementsByTagName('imgFile');
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name = "/blog/" . 'blog_' . time() . $k;
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        };
    }
}
