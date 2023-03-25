<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('logout', [DashboardController::class, 'adminLogout'])
    ->name('admin.logout');
});

Route::group(['middleware' => ['web']], function () {
    //auth
    Route::get('/login', [AuthController::class, 'login'])
        ->name('admin.login');
//        ->where('extension', '(?:.html)?');
    Route::post('post-login', [AuthController::class, 'submitLogin'])
        ->name('admin-login.post');
});
