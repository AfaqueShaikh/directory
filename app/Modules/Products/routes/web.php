<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Products\Http\Controllers\ProductsController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function () {
    Route::get('products', [ProductsController::class, 'index'])
        ->name('admin.products');

    Route::get('products/add', [ProductsController::class, 'addProduct'])
        ->name('admin.products.add');

    Route::post('products/add', [ProductsController::class, 'storeProduct'])
        ->name('admin.products.store');

    Route::get('products/{id}/edit', [ProductsController::class, 'editProduct'])
        ->name('admin.products.edit');

    Route::post('products/{id}/update', [ProductsController::class, 'updateProduct'])
        ->name('admin.products.update');

    Route::get('products/{id}/delete', [ProductsController::class, 'deleteProduct'])
        ->name('admin.products.delete');

});
