<?php


use Illuminate\Support\Facades\Route;


Route::post('/check-application-status', 'App\Http\Controllers\ApiController@checkApplicationStatus');
Route::post('/user/login', 'App\Http\Controllers\ApiController@userLogin');
Route::post('/verify-otp', 'App\Http\Controllers\ApiController@verifyOtp');
Route::post('/resend-otp', 'App\Http\Controllers\ApiController@resendOtp');
Route::post('/register', 'App\Http\Controllers\ApiController@register');
Route::post('/user/get-profile', 'App\Http\Controllers\ApiController@getUserProfile');

Route::group([ 'middleware' => ['api_auth']], function(){
    // Route::post('/user/get-profile', 'App\Http\Controllers\ApiController@getUserProfile');


});
