<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Support\Str;

/**
 *  @group POSTLAR
 * 
 * Postlar uchun api
 */
class PostController extends Controller
{   

    /**
     * Barcha active postlar
     */
    public function allActivePosts()
    {
        return PostResource::collection(Post::where('active_category_id', !null)->latest()->get());
    }


    /**
     * Yangi static post joylash
     */
    public function storeStaticPost(PostRequest $request)
    {
        $post = Post::create([
            'post_title' => [
                'en' => $request->input('post_title'),
                'ru' => $request->input('post_title'),
                'uz' => $request->input('post_title'),
                'уз' => $request->input('post_title'),
            ],
            'post_body' => [
                'en' => $request->input('post_body'),
                'ru' => $request->input('post_body'),
                'uz' => $request->input('post_body'),
                'уз' => $request->input('post_body'),
            ],
            'category_id' => $request->input('category_id'),

            //we could do this in obsersver
            'post_slug' => Str::slug($request->input('post_title.uz')),
        ]);

        $data = new PostResource($post);

        return $this->storedMessage($data);
    }

    /**
     * Yangi active post joylash
     */
    public function storeActivePost(PostRequest $request)
    {
        $post = Post::create([
            'post_title' => [
                'en' => $request->input('post_title'),
                'ru' => $request->input('post_title'),
                'uz' => $request->input('post_title'),
                'уз' => $request->input('post_title'),
            ],
            'post_body' => [
                'en' => $request->input('post_body'),
                'ru' => $request->input('post_body'),
                'uz' => $request->input('post_body'),
                'уз' => $request->input('post_body'),
            ],
            'active_category_id' => $request->input('active_category_id'),
            'post_slug' => Str::slug($request->input('post_title.uz')),
        ]);

        $data = new PostResource($post);

        return $this->storedMessage($data);
    }

    /**
     * Mavjud postni o'zgartirish
     */
    public function updatePost(PostRequest $request, Post $post)
    {
        $post->update([
            'post_title' => [
                'en' => $request->input('post_title'),
                'ru' => $request->input('post_title'),
                'uz' => $request->input('post_title'),
                'уз' => $request->input('post_title'),
            ],
            'post_body' => [
                'en' => $request->input('post_body'),
                'ru' => $request->input('post_body'),
                'uz' => $request->input('post_body'),
                'уз' => $request->input('post_body'),
            ],
            'active_category_id' => $request->input('active_category_id'),
            'category_id' => $request->input('category_id'),
            'post_slug' => Str::slug($request->input('post_title.uz')),
        ]);
    }

    /**
     * Postni toliq holda o'qish
     */
    public function showPost(Post $post)
    {
        return new PostResource($post);
    }

     /**
     * Visable statusni true qilish
     */
    public function makeVisable(Post $post)
    {
        $post->update([
            'is_visable' => true
        ]);
    }

    /**
     * Visable statusni false qilish
     */
    public function makeUnVisable(Post $post)
    {
        $post->update([
            'is_visable' => false
        ]);
    }

    /**
     * Mavjud postni o'chirib tashlash
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return $this->deletedMessage();
    }
}
