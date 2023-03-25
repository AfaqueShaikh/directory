<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Areas\Http\Controllers\AreasController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function () {
    Route::get('areas', [AreasController::class, 'index'])
        ->name('admin.areas');

    Route::get('areas/add', [AreasController::class, 'addArea'])
        ->name('admin.areas.add');

    Route::post('areas/add', [AreasController::class, 'storeArea'])
        ->name('admin.areas.store');

    Route::get('areas/{id}/edit', [AreasController::class, 'editArea'])
        ->name('admin.areas.edit');

    Route::post('areas/{id}/update', [AreasController::class, 'updateArea'])
        ->name('admin.areas.update');

    Route::get('areas/{id}/delete', [AreasController::class, 'deleteArea'])
        ->name('admin.areas.delete');

});
