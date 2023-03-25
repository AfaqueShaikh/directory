<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Categories\Http\Controllers\CategoriesController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function () {
    Route::get('categories', [CategoriesController::class, 'index'])
        ->name('admin.categories');

    Route::get('categories/add', [CategoriesController::class, 'addCategory'])
        ->name('admin.categories.add');

    Route::post('categories/add', [CategoriesController::class, 'storeCategory'])
        ->name('admin.categories.store');

    Route::get('categories/{id}/edit', [CategoriesController::class, 'editCategory'])
        ->name('admin.categories.edit');

    Route::post('categories/{id}/update', [CategoriesController::class, 'updateCategory'])
        ->name('admin.categories.update');

    Route::get('categories/{id}/delete', [CategoriesController::class, 'deleteCategory'])
        ->name('admin.categories.delete');

});
