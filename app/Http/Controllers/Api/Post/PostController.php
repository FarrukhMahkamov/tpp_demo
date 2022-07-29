<?php

namespace App\Http\Controllers\Api\Post;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Resources\Post\PostResource;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'post_title' => [
                'en' => $request->input('post_title'),
                'ru' => $request->input('post_title'),
                'uz' => $request->input('post_title'),
                'уз' => $request->input('post_title')
            ],
            'post_body' => [
                'en' => $request->input('post_body'),
                'ru' => $request->input('post_body'),
                'uz' => $request->input('post_body'),
                'уз' => $request->input('post_body')
            ],
            'category_id' => $request->input('category_id'),
            'post_slug' => Str::slug('slug oif the')
        ]);

        $data = new PostResource($post);

        return $this->storedMessage($data);
    }
}
