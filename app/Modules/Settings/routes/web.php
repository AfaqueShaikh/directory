<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Settings\Http\Controllers\SettingsController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function () {
    Route::get('settings', [SettingsController::class, 'index'])
        ->name('admin.settings');

    Route::post('settings/update-setting', [SettingsController::class, 'updateSettings'])
        ->name('admin.update-setting');
});
