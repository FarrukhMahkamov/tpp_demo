<?php

namespace App\Http\Controllers\Api\Category;

use Illuminate\Support\Str;
use App\Models\ActiveCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\MiniPostResource;
use App\Http\Requests\Category\ActiveCategoryRequest;
use App\Http\Resources\Category\ActiveCategoryResource;

/**
 *  @group CATEGORIALAR
 * 
 * Categorialar uchun API
 */
class ActiveCategoryController extends Controller
{   
    /**
     * Barcha categorial ro'yhati
     */
    public function index()
    {
        $activeCategories = ActiveCategory::latest()->get();

        return ActiveCategoryResource::collection($activeCategories);
    }

    /**
     * Malum bir categoriaga tegishli bolgan postlarni chiqarish
     */
    public function show(ActiveCategory $activeCategory)
    {
        return MiniPostResource::collection($activeCategory->post->paginate(20));
    }

    public function store(ActiveCategoryRequest $request)
    {
        $activeCategory = ActiveCategory::create([
            'category_name' => [
                'uz' => $request->input('category_name'),
                'уз' => $request->input('category_name'),
                'ru' => $request->input('category_name'),
                'en' => $request->input('category_name'),
            ],
            'category_slug' => Str::slug($request->input('category_name.uz')),
        ]);

        $storedData = new ActiveCategoryResource($activeCategory);

        return $this->storedMessage($storedData);
    }

    /**
     * Ma'lum bir categoriani tahrirlash
     */
    public function update(ActiveCategory $activeCategory, ActiveCategoryRequest $request)
    {
        $activeCategory->update([
            'uz' => $request->input('category_name'),
            'уз' => $request->input('category_name'),
            'ru' => $request->input('category_name'),
            'en' => $request->input('category_name'),
        ]);

        $updatedData = new ActiveCategoryResource($activeCategory);

        return $this->updatedMessage($updatedData);
    }

    /**
     * Ma'lum bir categoriani o'zgartirish
     */
    public function destroy(ActiveCategory $activeCategory)
    {
        $activeCategory->delete();

        return $this->deletedMessage();
    }
}
