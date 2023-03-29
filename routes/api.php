<?php


use Illuminate\Support\Facades\Route;


Route::post('/check-application-status', 'App\Http\Controllers\ApiController@checkApplicationStatus');
Route::post('/user/login', 'App\Http\Controllers\ApiController@userLogin');
Route::post('/verify-otp', 'App\Http\Controllers\ApiController@verifyOtp');
Route::post('/resend-otp', 'App\Http\Controllers\ApiController@resendOtp');
Route::post('/register', 'App\Http\Controllers\ApiController@register');
Route::post('/user/get-profile', 'App\Http\Controllers\ApiController@getUserProfile');
Route::post('/get-areas', 'App\Http\Controllers\ApiController@getAreas');
Route::post('/get-contacts', 'App\Http\Controllers\ApiController@getContacts');
Route::post('/get-relations', 'App\Http\Controllers\ApiController@getRelations');
Route::post('/get-business-categories', 'App\Http\Controllers\ApiController@getBusinessCategories');
Route::post('/get-businesses', 'App\Http\Controllers\ApiController@getBusinesses');
Route::post('/get-business-by-category', 'App\Http\Controllers\ApiController@getBusinessByCategory');
Route::post('/get-business-detail', 'App\Http\Controllers\ApiController@getBusinessDetail');
Route::post('/get-notifications', 'App\Http\Controllers\ApiController@getNotifications');
Route::post('/get-notifications-count', 'App\Http\Controllers\ApiController@getNotificationCount');
Route::post('/update-notification-read-status', 'App\Http\Controllers\ApiController@updateNotificationReadStatus');
Route::post('/user/add-relation', 'App\Http\Controllers\ApiController@addRelation');
Route::post('/user/update-profile', 'App\Http\Controllers\ApiController@updateUserProfile');
Route::post('/user/update-profile-picture', 'App\Http\Controllers\ApiController@updateUserProfilePicture');
Route::post('/user/update-cover-picture', 'App\Http\Controllers\ApiController@updateUserCoverPicture');

Route::group([ 'middleware' => ['api_auth']], function(){
    // Route::post('/user/get-profile', 'App\Http\Controllers\ApiController@getUserProfile');


});
