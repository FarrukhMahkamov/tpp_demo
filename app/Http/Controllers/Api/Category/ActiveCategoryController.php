<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\ActiveCategoryRequest;
use App\Http\Resources\Category\ActiveCategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\ActiveCategory;
use Illuminate\Http\Request;

class ActiveCategoryController extends Controller
{
    public function index()
    {
        $activeCategories = ActiveCategory::latest()->get();

        return ActiveCategoryResource::collection($activeCategories);
    }

    public function show(ActiveCategory $activeCategory)
    {
        return PostResource::collection($activeCategory->post);
    }

    public function store(ActiveCategoryRequest $request)
    {
        $activeCategory = ActiveCategory::create([
            'category_name' => [
                'uz' => $request->input('category_name'),
                'уз' => $request->input('category_name'),
                'ru' => $request->input('category_name'),
                'en' => $request->input('category_name')
            ],
            'category_slug' => $request->input('category_name.uz')
        ]);

        $storedData = new ActiveCategoryResource($activeCategory);

        return $this->storedMessage($storedData);
    }

    public function update(ActiveCategory $activeCategory, ActiveCategoryRequest $request)
    {
        $activeCategory->update([
            'uz' => $request->input('category_name'),
            'уз' => $request->input('category_name'),
            'ru' => $request->input('category_name'),
            'en' => $request->input('category_name')
        ]);

        $updatedData = new ActiveCategoryResource($activeCategory);

        return $this->updatedMessage($updatedData);
    }


    public function destroy(ActiveCategory $activeCategory)
    {
        $activeCategory->delete();

        return $this->deletedMessage();
    }
    
}
