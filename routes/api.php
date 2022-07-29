<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Post\PostController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Category\ActiveCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{category}', 'update');
        Route::delete('categories/{category}', 'delete');
    });

    Route::controller(PostController::class)
    ->group(function () {
        Route::post('posts-static', 'storeStaticPost');
        Route::post('posts-active', 'storeActivePost');
        Route::get('all-active-posts', 'allActivePosts');
    });

    Route::controller(ActiveCategoryController::class)
    ->group(function() {
        Route::get('active-categories', 'index');
        Route::post('active-categories', 'store');
        Route::get('active-categories/{activeCategory:category_slug}', 'show');
        Route::put('active-categories/{activeCategory:category_slug}', 'update');
        Route::delete('active-categories/{activeCategory:category_slug}', 'destroy');
    });
});
