<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\MockupsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShowcaseController;

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

Route::get('/', function () {
    return "coming soon";
});

Route::group(array('prefix' => 'dashboard'), function()
{
    Route::get('analytics', [
        AnalyticsController::class, 'index'
    ]);

    Route::get('cms',[
        CmsController::class, 'index'
    ]);

    Route::get('emails',[
        EmailsController::class, 'index'
    ]);

    Route::get('mockups',[
        MockupsController::class, 'index'
    ]);
    
    Route::get('settings',[
        SettingsController::class, 'index'
    ]);

    Route::get('showcase',[
        ShowcaseController::class, 'index'
    ]);

    Route::get('users',[
        UsersController::class, 'index'
    ]);
});