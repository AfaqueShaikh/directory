<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Users\Http\Controllers\UsersController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function () {
    Route::get('users', [UsersController::class, 'index'])
        ->name('admin.users');

    Route::get('users/add', [UsersController::class, 'addUser'])
        ->name('admin.users.add');

    Route::post('users/add', [UsersController::class, 'storeUser'])
        ->name('admin.users.store');

    Route::get('users/{id}/edit', [UsersController::class, 'editUser'])
        ->name('admin.users.edit');

    Route::post('users/{id}/update', [UsersController::class, 'updateUser'])
        ->name('admin.users.update');
});
