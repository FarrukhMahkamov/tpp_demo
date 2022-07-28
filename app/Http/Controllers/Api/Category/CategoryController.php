<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\Category\CategoryResource;
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
        $cateogires = Category::where('parent_category_id', null)->latest()->get();

        return CategoryResource::collection($cateogires);
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
            'category_name' => $request->input('category_name'),
            'category_slug' => Str::slug($request->input('category_name')),
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
            'category_name' => $request->input('category_name'),
            'category_slug' => Str::slug($request->input('category_name')),
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
