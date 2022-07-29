<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use Illuminate\Support\Str;

/**
* @group CATEGORIALAR
*
* Categorial uchun API
*/
class CategoryController extends Controller
{
    /**
    * Saytdagi barcha categorialar ro'yhati
    */
    public function index()
    {
        $cateogires = Category::visable()->tree()->get()->toTree();
        
        return CategoryResource::collection($cateogires);
    }
    
    public function show($id)
    {   
        $category = Category::findOrFail($id);

        return PostResource::collection($category->post);
    }
    /**
    * Yangi categoria joylash.
    *
    * @response data : {
        *    "id" : 12,
        *    "category_name : "Test Category"
        *    "category_slug" : "test-category",
        *    "parent_category_id" : 1,
        *    "created_at" : 2022-07-28 5:49 PM,
        *    "updated_at" : 2022-07-28 5:49 PM,
        *    "sub_categories" : null,
        * }
        */
        public function store(CategoryRequest $request)
        {
            $category = Category::create([
                'category_name' => [
                    'en' => $request->input('category_name'),
                    'ru' => $request->input('category_name'),
                    'uz' => $request->input('category_name'),
                    'уз' => $request->input('category_name')
                ],
                'category_slug' => Str::slug($request->input('category_name.uz')),
                'parent_category_id' => $request->parent_category_id,
            ]);
            
            $storedData = new CategoryResource($category);
            
            return $this->storedMessage($storedData);
        }
        
        /**
        * Mavjud categoriani o'zgartirish joylash.
        *
        * @response  data : {
            *     "id" : 12,
            *    "category_name" : "Updated Category"
            *    "category_slug" : "updated-category",
            *    "parent_category_id" : 1,
            *    "created_at" : 2022-07-28 5:49 PM,
            *    "updated_at" : 2022-07-28 5:49 PM,
            *    "sub_categories" : null,
            * }
            */
            public function update(CategoryRequest $request, Category $category)
            {   
                $category->update([
                    'category_name' => [
                        'en' => $request->input('category_name'),
                        'ru' => $request->input('category_name'),
                        'uz' => $request->input('category_name'),
                        'уз' => $request->input('category_name')
                    ],
                    'category_slug' => Str::slug($request->input('category_name.uz')),
                    'parent_category_id' => $request->parent_category_id,
                ]);
                
                $category = new CategoryResource($category);
                
                return $this->updatedMessage($category);
            }
            
            /**
            *  Tanlangan id dagi malumotni ochirib tashlash.
            */
            public function delete($id)
            {
                $category = Category::findOrFail($id);
                
                $category->delete();
                
                return $this->deletedMessage();
            }
        }
        