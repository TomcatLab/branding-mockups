<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\MockupsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\HomeController;

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

// Route::group(['prefix'=>''], function () {
//     Route::get('/', [
//         HomeController::class, 'index'
//     ]);
//     Route::get('/{page}', [
//         HomeController::class, 'index'
//     ]);
// });

Route::group(['prefix'=>'admin'],function(){

    // Analytics
    Route::get('/', [
        AnalyticsController::class, 'index'
    ]);

    Route::get('analytics', [
        AnalyticsController::class, 'index'
    ]);

    Route::group(['prefix'=>'cms'],function(){
        Route::get('pages-list',[
            CmsController::class, 'index'
        ]);
        Route::get('page/{id}',[
            CmsController::class, 'add'
        ]);
        Route::get('pages-trash',[
            CmsController::class, 'trash'
        ]);
    });

    Route::group(['prefix'=>'emails'],function(){
        Route::get('/',[
            EmailsController::class, 'index'
        ]);
    });

    Route::group(['prefix'=>'products'],function(){
        Route::get('mockups-list',[
            MockupsController::class, 'index'
        ]);
        Route::get('mockups-trash',[
            MockupsController::class, 'trash'
        ]);
        Route::get('showcase-list',[
            ShowcaseController::class, 'index'
        ]); 
        Route::get('showcase-trash',[
            ShowcaseController::class, 'index'
        ]);
    });
    
    Route::get('settings',[
        SettingsController::class, 'index'
    ]);

    Route::group(['prefix'=>'users'],function(){
        Route::get('users-list',[
            UsersController::class, 'index'
        ]);
        Route::get('users-add',[
            CmsController::class, 'add'
        ]);
        Route::get('users-trash',[
            CmsController::class, 'trash'
        ]);    
    });
});