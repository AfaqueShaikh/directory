<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('login', [LoginController::class, 'index'])
    ->name('login');
Route::post('post-login', [LoginController::class, 'submitLogin'])
    ->name('login.post');
Route::get('signup', [RegisterController::class, 'index'])
    ->name('register');
Route::post('post-signup', [RegisterController::class, 'register'])
    ->name('register.post');
//Route::get('dashboard', [RegisterController::class, 'dashboard']);

//logout
Route::group(['middleware' => ['auth']], function() {

    Route::get('dashboard', [DashboardController::class, 'dashboard'])
        ->name('user.dashboard');

    Route::get('dashboard/preferences', [DashboardController::class, 'preferences'])
        ->name('user.dashboard.preferences');

    Route::post('dashboard/update-about', [DashboardController::class, 'updateAbout'])
        ->name('user.dashboard.update-about');

    Route::post('dashboard/update-category', [DashboardController::class, 'updateCategory'])
        ->name('user.dashboard.update-category');

    Route::get('dashboard/referrals', [DashboardController::class, 'referrals'])
        ->name('user.dashboard.referrals');

    Route::get('dashboard/account', [DashboardController::class, 'account'])
        ->name('user.dashboard.account');

    Route::post('dashboard/account', [DashboardController::class, 'accountUpdate'])
        ->name('user.dashboard.accountUpdate');

    Route::get('marketplace', [MarketplaceController::class, 'index'])
        ->name('user.marketplace');

    Route::get('marketplace/orders', [OrdersController::class, 'index'])
        ->name('user.marketplace.orders');

    //checkout
    Route::get('marketplace/{product}/checkout', [CheckoutController::class, 'showCheckout'])
        ->name('user.marketplace.checkout');

    //checkout
    Route::post('proceed-to-checkout', [CheckoutController::class, 'proceedToCheckout'])
        ->name('marketplace.proceed-to-checkout');

    //order
    Route::get('marketplace/orders/{id}', [OrdersController::class, 'orderDetail'])
        ->name('user.marketplace.order');

    Route::get('marketplace/{category}/{product}', [MarketplaceController::class, 'productDetail'])
        ->name('user.marketplace.productDetail');


    /**
     * Logout Route
     */
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('user.logout');
});


Route::get('/clear-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    echo \Illuminate\Support\Facades\Artisan::output();
});

Route::get('/clear-config', function() {
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    echo \Illuminate\Support\Facades\Artisan::output();
});
