<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request){
        $posts = Post::orderBy('published_at','desc')->simplePaginate(5);
        $item = [];
        foreach ($posts->items() as $post){
            $item['id'] = $post->id;
            $item['title'] = $post->title;
            $item['summary'] = $post->subtitle;
            $item['thumb'] = url(config('blog.uploads.webpath').'/'.$post->page_image);
            $item['posted_at'] = $post->published_at;
            $item['views'] = mt_rand(1,10000);
            $items[] = $item;
        }
        $data = [
          'message'=>'success',
          'articles'=>$items
        ];
        return response()->json($data);
    }

    public function detail($id){
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }
}
